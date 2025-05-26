// Função utilitária para formatar datas
function formatarData(data) {
    const d = new Date(data);
    return d.toLocaleDateString('pt-BR');
}

let datasOcupadas = [];
let dataSelecionada = null;
let valorSelecionado = 0;
let horarioSelecionado = '';
let pacoteSelecionado = '';

// Utilitários para datas
const meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
let mesAtual = (new Date()).getMonth();
let anoAtual = (new Date()).getFullYear();

function renderizarSelectAno() {
    const select = $('#selectAno');
    select.empty();
    const anoBase = (new Date()).getFullYear();
    for (let a = anoBase - 1; a <= anoBase + 2; a++) {
        select.append(`<option value="${a}" ${a === anoAtual ? 'selected' : ''}>${a}</option>`);
    }
}

function buscarDatasOcupadas(mes, ano, callback) {
    $.get('/ManiaGames/festas/datas-ocupadas', function(datas) {
        datasOcupadas = datas.filter(d => {
            const dt = new Date(d);
            return dt.getMonth() === mes && dt.getFullYear() === ano;
        });
        if (callback) callback();
    });
}

function renderizarCalendario() {
    $('#mesAnoAtual').text(`${meses[mesAtual]} / ${anoAtual}`);
    const diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
    let html = '<table class="table table-bordered text-center" id="calendario-agendamento"><thead><tr>';
    diasSemana.forEach(d => html += `<th>${d}</th>`);
    html += '</tr></thead><tbody><tr>';
    const primeiroDia = new Date(anoAtual, mesAtual, 1);
    const ultimoDia = new Date(anoAtual, mesAtual + 1, 0);
    for (let i = 0; i < primeiroDia.getDay(); i++) html += '<td></td>';
    for (let dia = 1; dia <= ultimoDia.getDate(); dia++) {
        const dataAtual = new Date(anoAtual, mesAtual, dia);
        const dataStr = dataAtual.toISOString().slice(0, 10);
        const ocupada = datasOcupadas.includes(dataStr);
        html += `<td class="dia-calendario ${ocupada ? 'ocupado' : 'disponivel'}" data-data="${dataStr}" style="cursor:${ocupada ? 'not-allowed' : 'pointer'};background:${ocupada ? '#7c3aed' : ''};color:${ocupada ? '#fff' : ''}">${dia}</td>`;
        if ((dataAtual.getDay() + 1) % 7 === 0) html += '</tr><tr>';
    }
    html += '</tr></tbody></table>';
    $('#calendario-js').html(html);
}

function atualizarCalendario() {
    buscarDatasOcupadas(mesAtual, anoAtual, renderizarCalendario);
}

$(document).ready(function() {
    renderizarSelectAno();
    atualizarCalendario();
    // Navegação mês/ano
    $('#prevMes').click(function() {
        mesAtual--;
        if (mesAtual < 0) {
            mesAtual = 11;
            anoAtual--;
            renderizarSelectAno();
            $('#selectAno').val(anoAtual);
        }
        atualizarCalendario();
    });
    $('#nextMes').click(function() {
        mesAtual++;
        if (mesAtual > 11) {
            mesAtual = 0;
            anoAtual++;
            renderizarSelectAno();
            $('#selectAno').val(anoAtual);
        }
        atualizarCalendario();
    });
    $('#selectAno').change(function() {
        anoAtual = parseInt($(this).val());
        atualizarCalendario();
    });
});

// Selecionar dia do calendário
$(document).on('click', '.dia-calendario.disponivel', function() {
    $('.dia-calendario').removeClass('selecionado');
    $(this).addClass('selecionado');
    const dataSelecionada = $(this).data('data');
    const dataObj = new Date(dataSelecionada);
    const diaSemana = dataObj.getDay();
    // Preencher campo de data (formato para backend)
    $('#inputDataFesta').val(dataSelecionada);
    // Definir horários e valor conforme o dia
    let horarios = '';
    let valor = 0;
    if (diaSemana >= 1 && diaSemana <= 5) { // Seg a Sex
        horarios = '<option value="13h">13h</option><option value="18h">18h</option>';
        valor = 599;
    } else { // Sáb, Dom
        horarios = '<option value="15h">15h</option>';
        valor = 799;
    }
    $('#inputHorario').html('<option value="">Selecione</option>' + horarios).prop('disabled', false);
    $('#inputValor').val(valor);
    $('#inputHorario').val('');
});

function mostrarOpcoesPacote() {
    const data = new Date(dataSelecionada);
    const diaSemana = data.getDay();
    let html = '';
    if (diaSemana >= 1 && diaSemana <= 5) { // Seg a Sex
        html += `<div class="mb-2">Pacote: <strong>R$ 599</strong> (Seg à Sex, 13h ou 18h) - 3h de festa</div>`;
        html += `<button class="btn btn-outline-primary me-2" onclick="selecionarPacote('semana','13h',599)">13h</button>`;
        html += `<button class="btn btn-outline-primary" onclick="selecionarPacote('semana','18h',599)">18h</button>`;
    } else { // Sáb, Dom, Feriado
        html += `<div class="mb-2">Pacote: <strong>R$ 799</strong> (Sáb, Dom e feriados, 3h de festa)</div>`;
        html += `<button class="btn btn-outline-primary" onclick="selecionarPacote('fds','15h',799)">15h</button>`;
    }
    $('#opcoesPacote').html(html);
}

window.selecionarPacote = function(pacote, horario, valor) {
    pacoteSelecionado = pacote;
    horarioSelecionado = horario;
    valorSelecionado = valor;
    $('#valorFesta').text(valor.toLocaleString('pt-BR', {minimumFractionDigits:2}));
    $('#formAgendamento input[name=horario]').val(horario);
    $('#formAgendamento input[name=pacote]').val(pacote);
    $('#formAgendamento input[name=valor]').val(valor);
    $('#formAgendamento input[name=data_festa]').val(dataSelecionada);
    $('#formAgendamento').show();
}

$('#formAgendamento').on('submit', function(e) {
    e.preventDefault();
    const dados = $(this).serialize();
    $.post('/ManiaGames/festas/agendar', dados)
        .done(function(resp) {
            $('#mensagemSucesso').text('Agendamento realizado com sucesso!').show();
            $('#mensagemErro').hide();
            $('#formAgendamento').hide();
            $('#infoDataSelecionada').hide();
            atualizarCalendario();
        })
        .fail(function(xhr) {
            let msg = 'Erro ao agendar.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
                msg = Object.values(xhr.responseJSON.errors).join(' ');
            }
            $('#mensagemErro').text(msg).show();
            $('#mensagemSucesso').hide();
        });
});

// Abrir modal automaticamente se vier com #agendar na URL
$(document).ready(function() {
    if (window.location.hash === '#agendar') {
        $('#btnAgendar').trigger('click');
    }
});

