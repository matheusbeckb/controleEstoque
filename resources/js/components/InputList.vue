<template>
    <table>
        <tr>
            <td>
                <input type="text" v-on:keypress="addItem">
            </td>
        </tr>
        <tr>
            <td>
                <ul>
                    <li v-for="(itemList, index) in list" :key="index">{{ itemList }}</li>
                </ul>
            </td>
        </tr>
    </table>


</template>

<script>
    export default {
        name: "InputList",
        data: function(){
            return {
                list: [
                    'Rafael',
                    'Alvaro',
                    'Matheus'
                ]
            };
        },
        methods: {
            addItem(event) {
                if (event.code === 'Enter' || event.code === "NumpadEnter") {
                    this.list.push(event.target.value);
                    event.target.value = '';
                    event.target.focus();
                }
            }
        }
    }
</script>

<style>

</style>


