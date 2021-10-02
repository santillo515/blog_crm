<template>
    <div class="container">
        <h1>{{ hello}}</h1>
        <h2>{{ helloToUpper}}</h2>
        <h3>{{ sum(2,3)}}</h3>
        <img :src="img" alt="">
        <p v-if="true"> True </p>
        <ul>
            <li v-for="(index, car) in this.cars">
                {{index}} - {{car}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "ArticleComponent",
        data() {
            return {
                hello: 'Test World',
                img: 'https://via.placeholder.com/150/0000FF/808080 ?Text=Digital.com',
                cars: ['BMW', 'Nissan', 'Values']
            }
        },

        computed: {
            helloToUpper() {
                return this.hello.toUpperCase();
            }
        },

        methods: {
            sum(a, b) {
                return a +b;
            }
        },

        mounted() {
            console.log('Component article mounted')
        }
    }
</script>

<style scoped>

</style>
