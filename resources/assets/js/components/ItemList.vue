<template>
    <div class="item-list">
        <h2 class="title">There are {{ itemCount }} items in the list</h2>
        <h3 class="subtitle">{{ completedCount }}/{{ itemCount }} are completed</h3>
        <ul class="m-b-md">
            <li v-for="item in items" :class="['item-list__item', {'done': item.done}]">
                <label class="checkbox">
                    <input type="checkbox" v-model="item.done">
                    <span :class="['item__label', {'has-text-grey-light': item.done}]">{{ item.body }}</span>
                </label>
            </li>
        </ul>
        <form @submit.prevent="addNewItem">
            <div class="field has-addons">
                <div class="control is-expanded">
                    <input class="input" type="text" placeholder="What do you need?" v-model="newTodoItem">
                </div>
                <div class="control">
                    <button type="submit" class="button is-primary"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                items: [
                    {
                        body: 'Cauliflower',
                        done: false
                    },
                    {
                        body: 'Bread',
                        done: true
                    }
                ],
                newTodoItem: null
            }
        },
        methods: {
            addNewItem() {
                this.newTodoItem = this.newTodoItem.trim();
                if (this.newTodoItem.length === 0) {
                    window.EventBus.$emit('alert', {message: 'An item cannot be empty', status: 'warning'});
                    return;
                }

                this.items.push({
                    body: this.newTodoItem,
                    done: false
                });
                this.newTodoItem = '';

                window.EventBus.$emit('alert', {message: 'A new shopping item was added'});
            }
        },
        computed: {
            itemCount() {
                return this.items.length;
            },
            completedCount() {
                return _.filter(this.items, item => item.done).length;
            }
        }
    }
</script>
<style>
    .item-list__item.done .item__label {
        text-decoration: line-through;
    }
</style>