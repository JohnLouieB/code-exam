<template>
  <div class="hello">
    <button @click="CreateArticle()">Create New Article</button>
    <AddArticle v-show="addArticle"></AddArticle>
    <form>
      <table>
        <th>Article Title</th>
      </table>
    </form>
  </div>
</template>

<script>
import AddArticle from './addArticle.vue';
export default {
    name: "HelloWorld",
    props: {
        msg: String,
    },
    data() {
        return {
            addArticle: false
        };
    },
    methods: {
        CreateArticle() {
          this.addArticle = true;
          console.log('alert');
        }
    },
    components: { AddArticle }
}
</script>

