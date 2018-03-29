@extends('layouts.indexUser')
@section('content')
<div id="content" class="container-fluid">
     <div class="col-lg-6" style="padding-top: 15px;">
          @if(count($errors) > 0)
             @foreach ($errors->all() as $error)
               <div class="alert alert-danger">{{$error}}</div>
             @endforeach
             @else
               @include('flash::message')
           @endif
     </div>
    <div class="col-lg-6" style="padding-top: 15px;">
          <div class="card">
               <header class="card-heading card-image app_primary_bg">
                    <img src="{{ asset('assets/img/headers/pet-medic.jpg') }}" alt="" />
                    <h2 class="card-title left-bottom overlay text-white">Cita Médica</h2>
                    <ul class="card-actions icons fab-action right-bottom">
                         <li>
                              <button style="background-color: #2196f3" class="btn btn-primary animate-fab btn-fab" data-toggle="modal" data-target="#stepper_modal"><i class="zmdi zmdi-hospital"></i></button>
                         </li>
                    </ul>
               </header>
               <div class="card-body">
                    <strong>¡Visita al Médico Veterinario!</strong>
                    <p>Toca  <i class="zmdi zmdi-hospital"></i> y agenda una cita médica para tu mascota en 4 pasos!</p>
               </div>
          </div>
     </div>

     <div class="col-lg-6" style="padding-top: 15px;">
          <div class="card">
               <header class="card-heading card-image app_primary_bg">
                    <img src="{{ asset('assets/img/headers/pet-care.jpg') }}" alt="" />
                    <h2 class="card-title left-bottom overlay text-white">Peluquería</h2>
                    <ul class="card-actions icons fab-action right-bottom">
                         <li>
                              <button style="background-color: rgb(236, 64, 122)" class="btn btn-primary animate-fab btn-fab" data-toggle="modal" data-target="#stepper_modal1"><i class="zmdi zmdi-scissors"></i></button>
                         </li>
                    </ul>
               </header>
               <div class="card-body">
                    <strong>¡LLeva a tu mascota a la peluquería! </strong>
                    <p>Toca  <i class="zmdi zmdi-scissors"></i> y agenda una cita para peluquería en 4 pasos!</p>
               </div>

          </div>
     </div>
          <!-- Ventana Modal 1 -->
          <div class="modal modal-stepper fade" id="stepper_modal" tabindex="-1" role="dialog" aria-labelledby="stepper_modal">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">

                              <h4 class="modal-title" id="myModalLabel-2">Cita Médico-Veterinaria</h4>
                              <ul class="card-actions icons right-top">
                                   <li>
                                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                                             <i class="zmdi zmdi-close"></i>
                                        </a>
                                   </li>
                              </ul>
                    </div>
                    <div class="modal-body p-0">
                         <div class="stepper">
                              <ul class="nav nav-tabs" role="tablist">
                                   <li role="presentation" class="active">
                                        <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab" aria-controls="stepper-step-1" role="tab" title="Step 1">
                                             <span class="round-tab">1</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab" aria-controls="stepper-step-2" role="tab" title="Step 2">
                                             <span class="round-tab">2</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab" aria-controls="stepper-step-3" role="tab" title="Step 3">
                                             <span class="round-tab">3</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-4" data-toggle="tab" aria-controls="stepper-step-4" role="tab" title="Complete">
                                             <span class="round-tab">4</span>
                                        </a>
                                   </li>
                              </ul>
                              <div class="form-wrapper">
                                   {!! Form::open(['route' => ['store-cita'], 'method' => 'POST']) !!}
                                   {{ csrf_field() }}
                                        <div class="tab-content">
                                             <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3 >1. Cuéntanos el motivo de la consulta</h3>
                                                       </header>

                                                       <section class="stepper-body">
                                                            <!-- Motivo -->
                                                            <div class="form-group is-empty">
                                                                <label for="txtarea1" class="control-label">Escriba el motivo de la consulta:</label>
                                                                <textarea name="motivo" id="txtarea1" cols="30" rows="4" class="form-control" placeholder="Describa brevemente si {{$mascotas->nombre_mascota}} presenta algun síntoma o comportamiento extraño." maxlength="60" value="{{old('motivo')}}"></textarea>
                                                            </div>
                                                       </section>
                                                  </div>

                                                  <div class="modal-footer">
                                                       <ul class="list-inline pull-right">
                                                            <li>
                                                                 <a class="btn btn-primary next-step">Siguiente</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3 class="hs">2. Selecciona la fecha de en la que comenzaron los síntomas</h3>
                                                       </header>

                                                       <section class="stepper-body">
                                                            <!-- Fecha de los Sintomas -->
                                                            <div class="form-group is-empty">
                                                            <label for="datepicker-theme" class="control-label">{{$mascotas->nombre_mascota}} presenta estos síntomas desde:</label>
                                                              <div class="input-group">
                                                                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                                                <input type="text" class="form-control datepicker" id="datepicker-theme" type="date" placeholder="Selecciona la fecha" name="fecha_sintomas" value="{{old('fecha_sintomas')}}">
                                                              </div>
                                                            </div>
                                                       </section>

                                                  </div>
                                                  <div class="modal-footer">
                                                       <ul class="list-inline pull-right">
                                                            <li>
                                                                 <a class="btn btn-default prev-step">Atrás</a>
                                                            </li>
                                                            <li>
                                                                 <a class="btn btn-primary next-step">Siguiente</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                            <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                                                <div class="p-20">
                                                    <header>
                                                        <h3 class="hs">3. Agende su cita</h3>
                                                    </header>
                                                    <section class="stepper-body">
                                                        <div id="app">
                                                            <citas></citas>
                                                        </div>
                                                    </section>
                                                </div>
                                                <div class="modal-footer">
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                                <a class="btn btn-default prev-step">Atrás</a>
                                                        </li>
                                                        <li>
                                                                <a  class="btn btn-primary next-step" >Siguiente</a>
                                                                
                                                        </li>
                
                                                    </ul>
                                                </div>
                                            </div>
                                             <div class="tab-pane fade" role="tabpanel" id="stepper-step-4">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3> ¡IMPORTANTE!</h3>
                                                       </header>
                                                       <section class="stepper-body">
                                                            <p>1. Diríjase a las instalaciones de Mundo Mascotas en la Carrera 2 No. 65 - 21, B/ La Rivera, en la hora establecida para la cita con el Médico Veterinario.</p><br>
                                                            <p>2. El Valor de la consulta es de <strong>$15.000</strong>, por favor cancele esta suma antes de ingresar a su consulta.</p>
                                                           <!--  ID Mascotas -->
                                                            <input type="text" value="{{$mascotas->id}}" style="display: none;" name="id_mascota">
                                                            <!-- Estado Default -->
                                                            <input type="text" value="Nuevo" style="display: none;" name="estado">
                                                            <script>
                                                                 function activarBoton() {
                                                                      var x = document.getElementById("infoLeida");
                                                                      if (x.checked = true) {
                                                                          var b = document.getElementById("confirmar");
                                                                           b.disabled = false;
                                                                      }
                                                                 }
                                                            </script>
                                                            <div class="checkbox">
                                                                <label>
                                                                      <input type="checkbox" value="" id="infoLeida" onclick="activarBoton()"> He leído esta información.
                                                                 </label>
                                                            </div>
                                                       </section>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <ul class="list-inline pull-right">
                                                            <li>
                                                                 <a class="btn btn-default prev-step">Atrás</a>
                                                            </li>
                                                            <li>
                                                                 <a class="btn btn-default cancel-stepper" data-dismiss="modal">Cancelar</a>
                                                            </li>
                                                            <li>
                                                                 <button type="submit" id="confirmar" class="btn btn-primary next-step" disabled="">Confirmar</button>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                   {!! Form::close() !!}
                              </div>
                         </div>
                    </div>
                    <!-- modal-content -->
               </div>
               <!-- modal-dialog -->
          </div>
     </div>
     <!-- fin ventana modal 1 -->
      <!-- Ventana Modal 2 -->
          <div class="modal modal-stepper fade" id="stepper_modal1" tabindex="-1" role="dialog" aria-labelledby="stepper_modal1">
               <div class="modal-dialog" role="document">
                    <div class="modal-content">
                         <div class="modal-header">
                              <script>
                                   function seleccionarCombo() {
                                        var x = document.getElementById('servicio');
                                        x.setAttribute("value", "Combo");
                                   }
                                   function seleccionarBano() {
                                     var x = document.getElementById('servicio');
                                     x.setAttribute("value", "Bano");
                                   }
                              </script>

                              <h4 class="modal-title" id="myModalLabel-2">Cita Peluquería</h4>
                              <ul class="card-actions icons right-top">
                                   <li>
                                        <a href="javascript:void(0)" data-dismiss="modal" class="text-white" aria-label="Close">
                                             <i class="zmdi zmdi-close"></i>
                                        </a>
                                   </li>
                              </ul>
                    </div>
                    <div class="modal-body p-0">
                         <div class="stepper">
                              <ul class="nav nav-tabs" role="tablist">
                                   <li role="presentation" class="active">
                                        <a class="persistant-disabled" href="#stepper-step-5" data-toggle="tab" aria-controls="stepper-step-5" role="tab" title="Step 1">
                                             <span class="round-tab">1</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-6" data-toggle="tab" aria-controls="stepper-step-6" role="tab" title="Step 2">
                                             <span class="round-tab">2</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-7" data-toggle="tab" aria-controls="stepper-step-7" role="tab" title="Step 3">
                                             <span class="round-tab">3</span>
                                        </a>
                                   </li>
                                   <li role="presentation" class="disabled">
                                        <a class="persistant-disabled" href="#stepper-step-8" data-toggle="tab" aria-controls="stepper-step-8" role="tab" title="Complete">
                                             <span class="round-tab">4</span>
                                        </a>
                                   </li>
                              </ul>
                              <div class="form-wrapper">
                                   {!! Form::open(['route' => ['store-peluqueria'], 'method' => 'POST']) !!}
                                   {{ csrf_field() }}
                                        <div class="tab-content">
                                             <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-5">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3 class "h2">1. Seleccione el servicio</h3>
                                                       </header>

                                                       <section class="stepper-body">
                                                            <p>Estos son los servicios disponibles para <strong>{{$mascotas->nombre_mascota}}</strong></p>
                                                            <!-- Cartas de Precio -->
                                                                 <div class="pricing-wrapper">
                                                                      <div class="row">
                                                                           <!-- Carta Baño -->
                                                                           <div class="col-md-6">
                                                                              <div class="card-container" >
                                                                               <div class="card card-flip pricing-card">
                                                                                  <section class="card-front feature-pricing-card">
                                                                                     <div class="card-heading">
                                                                                         @if($mascotas->tipo_mascota == 'Conejo')
                                                                                         <div class="card-title">
                                                                                             <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>25.000</h1>
                                                                                             <span class="pricing-period"></span>
                                                                                             <span class="pricing-title text-blue">Baño</span>
                                                                                             <!-- Precio -->
                                                                                             <input type="hidden" name="precio" value="25000">
                                                                                        </div>
                                                                                        <div class="card-body">
                                                                                              <ul class="pricing-feature-list" style="padding-bottom: 5px;">
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Baño cosmético</li>
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Limpieza de oídos</li>
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Corte de Uñas</li>
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Blower/Cepillado </li>
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Moño/Corbatín</li>
                                                                                                   <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Higiene oral</li>
                                                                                              </ul>

                                                                                         </div>
                                                                                         @endif
                                                                                          @if($mascotas->tipo_mascota == 'Gato')
                                                                                          <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>25.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Baño</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precio" value="25000">
                                                                                         </div>
                                                                                         <div class="card-body">
                                                                                               <ul class="pricing-feature-list" style="padding-bottom: 5px;">
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Baño cosmético</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Limpieza de oídos</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Corte de Uñas</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Blower/Cepillado </li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Moño/Corbatín</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Higiene oral</li>
                                                                                               </ul>

                                                                                          </div>
                                                                                          @endif
                                                                                          @if($mascotas->tipo_mascota == 'Perro' && $mascotas->tamano == 'pequeno' && ($mascotas->peso == 'menos6'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>20.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Baño</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precio" value="20000">
                                                                                         </div>
                                                                                         @elseif($mascotas->tipo_mascota == 'Perro' && $mascotas->tamano == 'mediano' && ($mascotas->peso == '6a13'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>22.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Baño</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precio" value="22000">
                                                                                         </div>
                                                                                         @elseif($mascotas->tipo_mascota == 'Perro' && $mascotas->tamano == 'grande' && ($mascotas->peso == '13a25'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>30.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Baño</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precio" value="30000">
                                                                                         </div>
                                                                                         @elseif($mascotas->tipo_mascota == 'Perro' && $mascotas->tamano == 'extra' && ($mascotas->peso == '25mas'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>40.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Baño</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precio" value="40000">
                                                                                         </div>
                                                                                         @endif
                                                                                     </div>
                                                                                     @if($mascotas->tipo_mascota == 'Perro')
                                                                                     <div class="card-body">
                                                                                             <ul class="pricing-feature-list" style="padding-bottom: 5px;">
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Baño cosmético</li>
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Baño Medicado</li>
                                                                                               <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Corte Canino</li>
                                                                                               <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Corte de uñas </li>
                                                                                               <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Limpieza de oídos</li>
                                                                                               <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Drenaje de glándula</li>
                                                                                               <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Higiene oral</li>
                                                                                           </ul>
                                                                                     </div>
                                                                                     @endif
                                                                                      <div class="card-footer text-center" style="padding-top: 0;">

                                                                                        <button type="button" class="btn btn-info btn-round next-step" style="margin-top: 0;" onclick="seleccionarBano()">Seleccionar</button>

                                                                                     </div>
                                                                                  </section>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <!-- Fin carta baño -->
                                                                           <!-- Carta Combo -->
                                                                           <div class="col-md-6">
                                                                            <div class="card-container">
                                                                               <div class="card card-flip pricing-card">
                                                                                  <section class="card-front feature-pricing-card">
                                                                                     <div class="card-heading">
                                                                                          @if($mascotas->tipo_mascota == 'Gato')
                                                                                          <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>30.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-purple">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="30000">
                                                                                         </div>
                                                                                         <div class="card-body">
                                                                                               <ul class="pricing-feature-list">
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Incluye todo lo anterior</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Shampoo antipulgas</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de desparasitación</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de Vitaminas</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> ¡Reclama un obsequio!</li>
                                                                                               </ul>

                                                                                          </div>
                                                                                          @elseif($mascotas->tipo_mascota == 'Conejo')
                                                                                          <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>35.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-purple">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="35000">
                                                                                         </div>
                                                                                         <div class="card-body">
                                                                                               <ul class="pricing-feature-list">
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Incluye todo lo anterior</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Shampoo antipulgas</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de desparasitación</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de Vitaminas</li>
                                                                                                     <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> ¡Reclama un obsequio!</li>
                                                                                               </ul>

                                                                                          </div>
                                                                                          @elseif(($mascotas->tipo_mascota == 'Perro') && ($mascotas->tamano == 'pequeno') && ($mascotas->peso == 'menos6'))
                                                                                          <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>23.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="23000">

                                                                                         </div>
                                                                                         @elseif(($mascotas->tipo_mascota == 'Perro') && ($mascotas->tamano == 'mediano') && ($mascotas->peso == '6a13'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>25.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="25000">
                                                                                         </div>
                                                                                         @elseif(($mascotas->tipo_mascota == 'Perro') && ($mascotas->tamano == 'grande') && ($mascotas->peso == '13a25'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>35.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="35000">
                                                                                         </div>
                                                                                         @elseif(($mascotas->tipo_mascota == 'Perro') && ($mascotas->tamano == 'extra') && ($mascotas->peso == '25mas'))
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>45.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Combo</span>
                                                                                              <!-- Precio -->
                                                                                              <input type="hidden" name="precioCombo" value="45000">
                                                                                         </div>
                                                                                         <div class="card-body">
                                                                                                 <ul class="pricing-feature-list">
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Incluye todo lo anterior</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de desparasitación</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de Vitaminas</li>
                                                                                                    <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Reclama un obsequio</li>

                                                                                               </ul>
                                                                                         </div>
                                                                                         <div class="card-footer text-center">
                                                                                           <button type="button" class="btn btn-info btn-round next-step" style="background-color: #796AEE;" onclick="seleccionarCombo()">Seleccionar</button>
                                                                                        </div>
                                                                                         <!-- @else
                                                                                         <div class="card-title">
                                                                                              <h1 style="font-size: 55px;"><sup style="margin-right: 7px">$</sup>45.000</h1>
                                                                                              <span class="pricing-period"></span>
                                                                                              <span class="pricing-title text-blue">Combo</span>
                                                                                         </div> -->
                                                                                         @endif
                                                                                     </div>
                                                                                     @if($mascotas->tipo_mascota == 'Perro')
                                                                                     <div class="card-body">
                                                                                             <ul class="pricing-feature-list">
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-check"></i> Incluye todo lo anterior</li>
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de desparasitación</li>
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Dosis de Vitaminas</li>
                                                                                                <li class="pricing-feature"><i class="zmdi zmdi-plus"></i> Reclama un obsequio</li>

                                                                                           </ul>
                                                                                     </div>
                                                                                     @endif
                                                                                      <div class="card-footer text-center">
                                                                                        <button type="button" class="btn btn-info btn-round next-step" style="background-color: #796AEE;" onclick="seleccionarCombo()">Seleccionar</button>
                                                                                     </div>
                                                                                     </section>
                                                                                     </div>
                                                                                </div>
                                                                           </div>
                                                                           <!-- Fin Carta Combo -->
                                                                      </div>
                                                                 </div>
                                                            <!-- fin cartas de precio -->
                                                              <!-- Servicio seleccionado -->
                                                               <input type="text" id="servicio" style="display: none;" name="servicio">
                                                       </section>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" role="tabpanel" id="stepper-step-6">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3 class "h2">2. Otras especificaciones</h3>
                                                       </header>

                                                       <section class="stepper-body">
                                                             <!-- Especificacion de Corte -->
                                                            <div class="form-group is-empty">
                                                                <label for="txtarea1" class="control-label">¿Cómo quiere el corte para <strong>{{$mascotas->nombre_mascota}}</strong> ?:</label>
                                                                <textarea name="especificacion_corte" id="txtarea1" cols="30" rows="4" class="form-control" placeholder="Describa como sería el corte ideal para tu mascota." maxlength="60" value="{{old('motivo')}}"></textarea>
                                                            </div>
                                                       </section>

                                                  </div>
                                                  <div class="modal-footer">
                                                       <ul class="list-inline pull-right">
                                                            <li>
                                                                 <a class="btn btn-default prev-step">Atrás</a>
                                                            </li>
                                                            <li>
                                                                 <a class="btn btn-primary next-step">Siguiente</a>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                             <div class="tab-pane fade" role="tabpanel" id="stepper-step-7">
                                                <div class="p-20">
                                                     <header>
                                                          <h3 class="hs">3. Agende su cita</h3>
                                                     </header>

                                                     <section class="stepper-body">
                                                        <div id="root">
                                                            <peluqueria></peluqueria>{{--  Componente Vue  --}}
                                                        </div>

                                                     </section>
                                                </div>
                                                <div class="modal-footer">
                                                     <ul class="list-inline pull-right">
                                                          <li>
                                                               <a class="btn btn-default prev-step">Atrás</a>
                                                          </li>
                                                          <li>
                                                               <a class="btn btn-primary next-step">Siguiente</a>
                                                          </li>
                                                     </ul>
                                                </div>
                                           </div> 
                                             <div class="tab-pane fade" role="tabpanel" id="stepper-step-8">
                                                  <div class="p-20">
                                                       <header>
                                                            <h3>¡IMPORTANTE!</h3>
                                                       </header>
                                                       <section class="stepper-body">
                                                            <p>1. Si usted vive en el perímetro de Mundo Mascotas, tendrá domicilio ¡GRATIS!, sino, llámenos para acordar el domicilio. En caso de no aceptarlo, diríjase a las instalaciones de Mundo Mascotas en la Carrera 2 No. 65 - 21, B/ La Rivera, en la hora y fecha previamente establecidas la cita  de peluquería.</p><br>
                                                            <p>2. Por favor cancele el valor del servicio seleccionado, antes o después de recibir su mascota.</p>

                                                            <script>
                                                                 function activarBoton2() {
                                                                      var x = document.getElementById("infoLeida2");
                                                                      if (x.checked = true) {
                                                                          var b = document.getElementById("confirmar2");
                                                                           b.disabled = false;
                                                                      }
                                                                 }
                                                            </script>
                                                            <div class="checkbox">
                                                                <label>
                                                                      <input type="checkbox" value="" id="infoLeida2" onclick="activarBoton2()"> He leído esta información.
                                                                 </label>
                                                            </div>
                                                            <input type="text" value="{{$mascotas->id}}" style="display: none;" name="id_mascota">
                                                       </section>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <ul class="list-inline pull-right">
                                                            <li>
                                                                 <a class="btn btn-default prev-step">Atrás</a>
                                                            </li>
                                                            <li>
                                                                 <a class="btn btn-default cancel-stepper">Cancelar</a>
                                                            </li>
                                                            <li>
                                                                 <button type="submit" class="btn btn-primary next-step" id="confirmar2" disabled="">Confirmar</button>
                                                            </li>
                                                       </ul>
                                                  </div>
                                             </div>
                                        </div>
                                    {!! Form::close() !!}
                              </div>
                         </div>
                    </div>
                    <!-- modal-content -->
               </div>
               <!-- modal-dialog -->
          </div>
     </div>
     <!-- fin ventana modal 2 -->
</div>
@endsection
