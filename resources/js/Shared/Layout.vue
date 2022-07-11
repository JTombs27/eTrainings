<template>
    <div>
        <Sidebar></Sidebar>
        <div class="page-container">
            
            <Notification></Notification>

            <Nav></Nav>
            <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <slot></slot>
                </div>
            </main>

            <Footer></Footer>
        </div>
    </div>
</template>
<script>
import Nav from "@/Shared/Nav";
import Footer from "@/Shared/Footer";
import Sidebar from "@/Shared/Sidebar.vue";

export default {
    components: {
        Nav,
        Footer,
        Sidebar,
    },
};
</script>