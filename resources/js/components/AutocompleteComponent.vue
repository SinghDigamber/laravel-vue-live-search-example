<template>
    <div>
        <input type="text" v-model="keyword">
        <ul v-if="Books.length > 0">
            <li v-for="book in Books" :key="book.id" v-text="book.name"></li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keyword: null,
            Books: []
        };
    },
    watch: {
        keyword(after, before) {
            this.getResults();
        }
    },
    methods: {
        getResults() {
            axios.get('/livesearch', { params: { keyword: this.keyword } })
                .then(res => this.Books = res.data)
                .catch(error => {});
        }
    }
}
</script>