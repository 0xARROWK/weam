<template>

    <div>

        <menu-top></menu-top>

        <div class="container">

            <ul class="list-group">
                <li class="list-group-item">
                    <a href="#">Tâche 1</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Tâche 2</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Tâche 3</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Tâche 4</a>
                </li>
            </ul>

        </div>

    </div>

</template>

<script>

    import MenuTop from '../menus/SettingsTopMenuComponent';

    export default {

        name: 'tasks',

        components: {
            'MenuTop': MenuTop
        }

    }

</script>
