<template>
    <div class="modal" tabindex="-1" id="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">{{ modalTitle }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="closeModal"></button>
          </div>
          <div class="modal-body">
              <div class="row">
                <slot></slot>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" @click="closeModal">Close</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"  @click="saveModal">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
export default {
    props: {
        modalTitle: String,
    },
    mounted() {
        var myModal = new window.bootstrap.Modal(document.getElementById('modal'))
        myModal.show()
    },
    methods: {
        closeModal() {
            this.$emit('closeModal')
        },
        saveModal() {
            this.$emit('saveModal')
        }
    }
}
</script>

