<template>
    <div>
        <div class="container d-flex justify-content-between py-3">
            <span class="fw-bold">Eskimi</span>
            <!-- <span>User</span> -->
            <button-component @btn-clicked="$emit('toggle-form')" type="btn-primary">Add Campaign</button-component>
        </div>
    </div>
</template>

<script>
import ButtonComponent from './ButtonComponent.vue'
export default {
    name: 'Nav',
    components: { ButtonComponent }
}
</script>
