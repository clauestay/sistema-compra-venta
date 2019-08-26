@extends('principal')
@section('contenido')

 <!-- checkear si ek usuario esta autenticado y su rol 
        1 administrador
        2 vendedor
        3 almacenero -->
    @if(Auth::check())
        @if(Auth::user()->idrol == 1)
            <template v-if="menu==0">
                <dashboard></dashboard>
            </template>
                
             <template v-if="menu==1">
                <categoria></categoria>
            </template>
                
                        <template v-if="menu==2">
                        <articulo></articulo>
                        </template>
                
                        <template v-if="menu==3">
                        <ingreso></ingreso>
                        </template>
                
                        <template v-if="menu==4">
                        <proveedor></proveedor>
                        </template>
                
                        <template v-if="menu==5">
                        <venta></venta>
                        </template>
                
                        <template v-if="menu==6">
                        <cliente></cliente>
                        </template>
                
                        <template v-if="menu==7">
                        <user></user>
                        </template>
                
                        <template v-if="menu==8">
                        <rol></rol>
                        </template>
                
                        <template v-if="menu==9">
                        <consultaingreso></consultaingreso>
                        </template>
                
                        <template v-if="menu==10">
                        <consultaventa></consultaventa>
                        </template>
                
                        <template v-if="menu==11">
                        <div>
                        <h1>Ayuda</h1>
                        </div>
                        </template>
                
                        <template v-if="menu==12">
                        <div>
                        <h1>Accerca de</h1>
                        </div>
                        </template>
                
            @elseif (Auth::user()->idrol == 2)
            <template v-if="menu==0">
                    <dashboard></dashboard>
                </template>
            <template v-if="menu==5">
                    <venta></venta>
                    </template>
            
                    <template v-if="menu==6">
                    <cliente></cliente>
                    </template>
                    <template v-if="menu==10">
                        <consultaventa></consultaventa>
                            </template>
                    
                            <template v-if="menu==11">
                            <div>
                            <h1>Ayuda</h1>
                            </div>
                            </template>
                    
                            <template v-if="menu==12">
                            <div>
                            <h1>Accerca de</h1>
                            </div>
                            </template>
            @elseif (Auth::user()->idrol == 3)
            <template v-if="menu==0">
                    <dashboard></dashboard>
                </template>
            <template v-if="menu==1">
                    <categoria></categoria>
                    </template>
            
                    <template v-if="menu==2">
                    <articulo></articulo>
                    </template>
            
                    <template v-if="menu==3">
                        <ingreso></ingreso>
                        </template>
            
                    <template v-if="menu==4">
                    <proveedor></proveedor>
                    </template>
                    <template v-if="menu==9">
                        <consultaingreso></consultaingreso>
                            </template>
                            <template v-if="menu==11">
                                    <div>
                                    <h1>Ayuda</h1>
                                    </div>
                                    </template>
                            
                                    <template v-if="menu==12">
                                    <div>
                                    <h1>Accerca de</h1>
                                    </div>
                                    </template>
            @else
            @endif             
        @endif   
        <!--fin checkeo-->
    
        @endsection