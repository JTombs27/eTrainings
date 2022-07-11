<template>
    <div 
        id="sidebar-wrapper" 
        class="sidebar-nav nav navbar-inverse" 
    >
        <div class="row" style="width: 380px;">
            <div class="bgc-white">  
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLiveLabel">Advanced Filtering</h5>
                    <button type="button" class="btn-close" @click="$emit('closeFilter')"></button>
                </div>
                <div class="modal-body">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>
    #sidebar-wrapper {
        width: auto;
        margin-top: -9px;
        z-index: 1000;
        position: fixed;
        right: 250px;
        height: 100%;
        margin-right: -250px;
        overflow-y: auto;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
    }
</style>