<template>
    <div class="container">
        <h1>Hello {{fullname}} - {{name}}</h1>
    </div>
</template>

<script>
    export default {
        name: "ArticleComponent",

        computed: {
            fullname() {
                return this.$store.getters.getFullName;
            },
            name() {
                return this.$store.state.firstname;
            }
        },

        mounted() {
            console.log('Component article mounted')
        }
    }
</script>

<style scoped>

</style>
