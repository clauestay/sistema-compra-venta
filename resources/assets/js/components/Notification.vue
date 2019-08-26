<template>
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bell"></i> Notificaciones </a>
            <span class="badge badge-pill badge-danger">{{notifications.length}}</span>
            <div class="nav-dropdown-items">
                <!-- <div v-if="notifications.legth"> -->
                <li v-for="item in listar" :key="item.id">
                    <div class="nav-item">
                        <!-- <a class="nav-link" href="#">Ingresos</a>
                        <span class="badge badge-danger">2</span> -->
                        <i class="fa fa-envelope-o">{{item.ingresos.msj}}</i>
                        <span class="badge badge-success">{{item.ingresos.numero}}</span>
                    </div>
                    <div class="nav-item">
                        <!-- <a class="nav-link" href="#">Ventas</a>
                        <span class="badge badge-danger">2</span> -->
                        <i class="fa fa-tasks">{{item.ventas.msj}}</i>
                        <span class="badge badge-danger">{{item.ventas.numero}}</span>
                    </div>
                </li>
                </div>
                <!-- <div v-else> 
                    <a><span>No tiene Notificaciones</span></a>
                </div> -->
            <!-- </div> -->
    </li> 
</template>

<script>
export default {
    props : ['notifications'],
    data (){
        return {
            arrayNotifications:[]
        }
    },
    computed:{
        listar: function(){
            //return this.notifications[0];
            this.arrayNotifications = Object.values(this.notifications[0]);
            if(this.notifications == ''){
                return this.arrayNotifications = [];
            } else {
                this.arrayNotifications = Object.values(this.notifications[0]);
                if(this.arrayNotifications.length > 3){
                    return Object.values(this.arrayNotifications[4]);
                } else {
                    return Object.values(this.arrayNotifications[0]);
                }
            }
        }
    }
}
</script> 