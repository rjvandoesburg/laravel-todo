<template>
    <div class="notification-container">
        <div v-for="item in notifications" class="m-b-sm notification-item" v-show="item.active">
            <div :class="['notification', statusClass(item.status)]" v-text="item.message"></div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications: [],
            }
        },
        mounted() {
            window.EventBus.$on('alert', this.showNotification)
        },
        methods: {
            statusClass(status) {
                switch (status) {
                    case 'info':
                        return 'is-info';
                    case 'error':
                        return 'is-danger';
                    case 'warning':
                        return 'is-warning';
                    default:
                        return 'is-success';
                }
            },
            showNotification({message, status}) {
                this.notifications.push({
                    message,
                    status,
                    active: true
                });
                // Remove the item again after 1.5 seconds
                setTimeout(() => {
                    this.notifications.shift();
                }, 1500)
            }
        }
    }
</script>
<style>
    .notification-container {
        position: fixed;
        bottom: 1rem;
        right: 1rem;
        width: 100%;
    }

    .notification-item {
        display: flex;
        justify-content: right;
    }
</style>