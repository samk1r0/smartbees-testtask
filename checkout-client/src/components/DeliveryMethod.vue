<script>
    export default {
        props: ['title','price','image','name'],
        methods: {
            deliveryMethodPicked(){
                this.$emit("emit-result", this.title)
            }
        }
    };
</script>
<template>
    <div class="my-8 flex justify-between">
        <div class="flex items-center">
            <input @click="deliveryMethodPicked" class="accent-pink-500 h-6 w-6" type="radio" :id="name" name="delivery_type" :value="name" required>
            <img class=" ml-1 w-12 inline" :src="image" alt="">
            <label class="ml-3" :for="name">{{ title }}</label>
        </div>
        <b>{{ price }} zł</b>
    </div>
</template>