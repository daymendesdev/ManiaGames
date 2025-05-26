@extends('layouts.app')

@section('content')
<div class="container-agendamento">
    <h2 class="text-center mb-4">Agendar Festa</h2>
    <div class="container-agendamento-flex">
        <div class="col-calendario">
            <!-- Controles de navegação do calendário -->
            <div class="d-flex justify-content-center align-items-center mb-3" id="controle-calendario">
                <button class="btn btn-outline-secondary btn-sm me-2" id="prevMes">&#8592;</button>
                <span id="mesAnoAtual" style="min-width: 160px; display: inline-block; text-align: center;"></span>
                <button class="btn btn-outline-secondary btn-sm ms-2" id="nextMes">&#8594;</button>
                <select id="selectAno" class="form-select form-select-sm ms-3" style="width: auto; display: inline-block;"></select>
            </div>
            <!-- Calendário será renderizado via JS -->
            <div id="calendario-js"></div>
            <!-- Campos de data, horário e valor -->
            <div class="campos-data-row">
                <div>
                  <label>Data da Festa*</label>
                  <input type="text" class="form-control" name="data_festa" id="inputDataFesta" readonly required>
                </div>
                <div>
                  <label>Horário*</label>
                  <select class="form-control" name="horario" id="inputHorario" required>
                    <option value="">Selecione a data primeiro</option>
                  </select>
                </div>
                <div>
                  <label>Valor*</label>
                  <input type="text" class="form-control" name="valor" id="inputValor" readonly required>
                </div>
            </div>
        </div>
        <div class="col-form-agendamento">
            <form id="formAgendamento" class="mt-3 mt-md-0">
              <div class="row">
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="nome" placeholder="Nome*" required>
                </div>
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="rg" placeholder="RG*" required>
                </div>
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="cpf" placeholder="CPF*" required>
                </div>
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="endereco" placeholder="Endereço*" required>
                </div>
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="cep" placeholder="CEP*" required>
                </div>
                <div class="col-12 mb-2">
                  <input type="text" class="form-control" name="celular" placeholder="Celular*" required>
                </div>
              </div>
              <div class="mb-2">
                <label>Forma de Pagamento*</label>
                <select class="form-control" name="forma_pagamento" required>
                  <option value="">Selecione</option>
                  <option value="pix">PIX</option>
                  <option value="debito">Cartão de Débito</option>
                  <option value="credito">Cartão de Crédito</option>
                </select>
              </div>
              <button type="submit" class="btn btn-success w-100">Pagar e Agendar</button>
            </form>
            <div id="mensagemSucesso" class="alert alert-success mt-3" style="display:none;"></div>
            <div id="mensagemErro" class="alert alert-danger mt-3" style="display:none;"></div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="/css/festas.css">
@endpush

@push('scripts')
<script src="/js/festas.js"></script>
@endpush


