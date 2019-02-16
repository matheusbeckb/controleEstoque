<template>
    <div class="card card-default">
        <div v-bind:class="defineCor">{{titulo}}</div>

            <div class="card-body">
                <slot></slot>
            </div>
        </div>
</template>

<script>
    export default {
        props:['titulo', 'cor'],
        computed:{
            defineCor: function(){
                return "card-header " + (this.cor || "bg-default");
            }
        }
    }
</script>

<style media="screen">


</style>
