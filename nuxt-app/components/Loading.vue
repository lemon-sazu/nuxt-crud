<template>
    <div class="d-flex align-items-center gap-2">
        <div class="spinner-border text-info" role="status">
            <span class="visually-hidden">Loading...</span>
        </div> {{ title }}...
    </div>
</template>
<script>
export default{
    name: 'Loading',
    props:{
        title:String
    }
}
</script>