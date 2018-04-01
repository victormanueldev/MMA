<template>
                            
                                        <div>
                                            <!-- Fecha de la Cita -->
                                        <div class="form-group is-empty">
                                                <label for="datepicker-theme" class="control-label">Escoja la fecha para su cita:</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                                                    <input type="date" class="form-control "  name="fecha_cita" v-model="nuevaCita.fecha_cita" value="">

                                                </div>
                                        </div>
                                        <!-- Hora de la cita -->
                                        <div class="form-group">
                                                <label for="radio" class="control-label">Escoja la hora de su preferencia</label>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="09:00:00" v-model="nuevaCita.hora_cita" checked="">09:00 a.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="09:30:00" v-model="nuevaCita.hora_cita">
                                                        09:30 a.m.
                                                    </label>
                                                </div>

                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="10:00:00" v-model="nuevaCita.hora_cita">10:00 a.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="10:30:00" v-model="nuevaCita.hora_cita">
                                                        10:30 a.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="11:00:00" v-model="nuevaCita.hora_cita">11:00 a.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="11:30:00" v-model="nuevaCita.hora_cita">
                                                        11:30 a.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="12:00:00" v-model="nuevaCita.hora_cita">12:00 a.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="12:30:00" v-model="nuevaCita.hora_cita">
                                                        12:30 p.m.
                                                    </label>
                                                </div>
                                                <hr>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="13:00:00" v-model="nuevaCita.hora_cita">01:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="13:30:00" v-model="nuevaCita.hora_cita">
                                                        01:30 p.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="14:00:00" v-model="nuevaCita.hora_cita">02:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="14:30:00" v-model="nuevaCita.hora_cita">
                                                        02:30p.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="15:00:00" v-model="nuevaCita.hora_cita">03:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="15:30:00" v-model="nuevaCita.hora_cita">
                                                        03:30p.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="16:00:00" v-model="nuevaCita.hora_cita">04:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="16:30:00" v-model="nuevaCita.hora_cita">
                                                        04:30p.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="17:00:00" v-model="nuevaCita.hora_cita">05:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="17:30:00" v-model="nuevaCita.hora_cita">
                                                        05:30p.m.
                                                    </label>
                                                </div>
                                                <div class="radio block">
                                                    <label><input type="radio" name="hora_cita" value="18:00:00" v-model="nuevaCita.hora_cita">06:00 p.m.</label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="hora_cita"  value="18:30:00" v-model="nuevaCita.hora_cita">
                                                        06:30p.m.
                                                    </label>
                                                </div>
                                        </div>
                                        <p class="alert alert-success" style="color: white;background-color: #26a69acc;" v-if="disponibilidadCita"><strong>¡Turno Disponible!</strong> </p>
                                        <p class="alert alert-danger" style="color: white;/*background-color: #26a69acc;*/" v-if="!disponibilidadCita">Turno ocupado, por favor intente con otra hora o fecha</p>
                                    </div>


</template>

<script>
    export default {
        mounted() {
            //Llamar al metodo al iniciar el componente
            this.fetchData();
        },
        data (){
            return {
                citas: { //Objeto para citas de la BD
                    fecha_cita: '',
                    hora_cita: ''
                },
                nuevaCita: { //Objeto para las nuevas citas
                    fecha_cita: '',
                    hora_cita: ''
                },
                mensaje: ''
            }
        },
        methods: {
            //Guarda todos los datos de la BD en el objeto citas
            fetchData(){
                var url = 'https://www.mundomascotascali.com/citas-index'//URL para traer los datos de la BD
                axios.get(url)
                .then((res) => {
                    this.citas = res.data//Guarda los datos en el objeto
                })
                .catch((err) => {
                    console.log(err)
                })
            }
        },
        computed: {//Solo se ejecuta si el objeto nuevaCita tiene algun cambio en sus atributos
            disponibilidadCita: function () {
                var i = 0
                var cont = 0
                //this.nuevaCita.fecha_cita.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');//Cambia el formato de la fecha entrante
                for(i in this.citas){//Compara todos los atributos del Objeto citas con los de nuevaCita
                    if( this.citas[i].hora_cita == this.nuevaCita.hora_cita && this.citas[i].fecha_cita == this.nuevaCita.fecha_cita){
                        cont++
                    }
                }
                if(cont != 0){
                     return false//Si hay conincidencias
                    
                }else{
                     return true //No hay coincidencias
                }
            }
        }
    }
</script>
