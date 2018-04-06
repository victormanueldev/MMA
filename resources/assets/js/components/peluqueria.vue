<template>
    <div>
             

            <!-- Fecha cita Peluqueria -->
            <div class="form-group is-empty">
                    <label for="datepicker-theme" class="control-label">Escoja la fecha para su cita:</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <input  class="form-control" type="date" placeholder="Seleccionar fecha" name="fecha_peluqueria" v-model="nuevaPeluqueria.fecha_peluqueria">
                </div>
            </div>
            <!-- Hora de la cita -->
            <div class="form-group">
                    <label for="radio" class="control-label">Escoja la hora de su preferencia</label>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="09:00:00" v-model="nuevaPeluqueria.hora_peluqueria">09:00 a.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="09:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            09:30 a.m.
                        </label>
                    </div>

                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="10:00:00" v-model="nuevaPeluqueria.hora_peluqueria">10:00 a.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="10:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            10:30 a.m.
                        </label>
                    </div>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="11:00:00" v-model="nuevaPeluqueria.hora_peluqueria">11:00 a.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="11:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            11:30 a.m.
                        </label>
                    </div>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="12:00:00" v-model="nuevaPeluqueria.hora_peluqueria">12:00 a.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="12:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            12:30 p.m.
                        </label>
                    </div>
                    <hr>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="13:00:00" v-model="nuevaPeluqueria.hora_peluqueria">01:00 p.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="13:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            01:30 p.m.
                        </label>
                    </div>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="14:00:00" v-model="nuevaPeluqueria.hora_peluqueria">02:00 p.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="14:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            02:30p.m.
                        </label>
                    </div>
                    <div class="radio block">
                        <label><input type="radio" name="hora_peluqueria" value="15:00:00" v-model="nuevaPeluqueria.hora_peluqueria">03:00 p.m.</label>
                        <label class="radio-inline">
                            <input type="radio" name="hora_peluqueria"  value="15:30:00" v-model="nuevaPeluqueria.hora_peluqueria">
                            03:30p.m.
                        </label>
                    </div>
            </div>
            <p class="alert alert-success" style="color: white;background-color: #26a69acc;" v-if="disponibilidadTurno"><strong>¡Turno Disponible!</strong> </p>
            <p class="alert alert-danger" style="color: white;/*background-color: #26a69acc;*/" v-if="!disponibilidadTurno"><strong>¡Turno Ocupado!</strong>, por favor intente con otra hora o fecha</p>
        </div>
</template>

<script>
    export default {
        mounted() {
            this.fetchDataP()
        },
        data (){
            return {
                peluquerias: {
                    fecha_peluqueria: '',
                    hora_peluqueria: ''
                },
                nuevaPeluqueria: {
                    fecha_peluqueria: '',
                    hora_peluqueria: ''
                },
                mensaje: ''
            }
        },
        methods: {
            fetchDataP(){
                var url = 'https://www.mundomascotascali.com/peluquerias-index'
                axios.get(url)
                .then((res) => {
                    this.peluquerias = res.data
                })
                .catch((err) => {
                    console.log(err)
                })
            }
        },
        computed: {
            disponibilidadTurno: function () {
                var i = 0
                var cont = 0
                //this.nuevaPeluqueria.fecha_peluqueria.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3/$2/$1');
                for(i in this.peluquerias){
                    if( this.peluquerias[i].hora_peluqueria == this.nuevaPeluqueria.hora_peluqueria && this.peluquerias[i].fecha_peluqueria == this.nuevaPeluqueria.fecha_peluqueria){
                        cont++
                    }
                }
                if(cont != 0){
                     return false
                    
                }else{
                     return true
                }
            }
        }
    }
</script>
