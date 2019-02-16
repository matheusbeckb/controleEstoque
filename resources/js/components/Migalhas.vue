<template>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li v-for="item in lista" v-bind:key=(item.id) class="breadcrumb-item"><a v-if="item.url" v-bind:class="defineClass" v-bind:href="item.url">{{ item.titulo }}</a><span v-if="!item.url">{{ item.titulo }}</span></li>
        </ol>
    </nav>
</template>

<script>
    export default {
        name: "Migalhas",

        props: ['lista'],
        computed: {
            defineClass: function() {
                if (this.url) {
                    return "active";
                }else {
                    return "";
                }
            }
        }

    }
</script>

<style>

</style>