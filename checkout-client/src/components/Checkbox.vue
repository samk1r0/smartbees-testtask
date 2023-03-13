
<script>
    export default {
        props: ['name']
    };
</script>

<template>
        <input class="mt-8 
                relative
                w-7
                checked:before:content-[''] 
                checked:before:absolute
                checked:before:w-2
                checked:before:h-3
                checked:before:border-solid
              checked:before:border-rose-500
                checked:before:border-b-[3px]
                checked:before:border-r-[3px]
                checked:before:z-10
                checked:before:rotate-45
                checked:before:left-2
                after:content-[''] 
                after:absolute
                after:w-6
                after:h-6
                after:border-solid
                after:border-grey
                after:-top-1
                after:border
              after:bg-white
                after:rounded
                after:z-9
                " type="checkbox" v-bind:name="name" v-bind:id="name">
</template>