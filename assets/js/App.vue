<template>
    <div id="app">
        <navbar></navbar>
        <hello></hello>
    </div>
</template>

<script>
    import Navbar from './components/Navbar'
    import Hello from './components/Hello'

    class TestClassSyntax {

    }

    export default {
        name: 'app',
        components: {
            Hello,
            Navbar
        }
    }
</script>