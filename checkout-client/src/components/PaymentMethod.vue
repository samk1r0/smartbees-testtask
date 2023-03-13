<script>
    export default {
        props: ['title','price','image','id']
    };
</script>

<template>
    <div class=" my-6 flex items-center">
        <input class="accent-pink-500 h-6 w-6" type="radio" :id="id" name="payment_gateway" :value="id" required>
        <img class=" ml-1 w-12 inline" :src="image" alt="">
        <label class="ml-3" :for="id">{{ title }}</label>
    </div>
</template>