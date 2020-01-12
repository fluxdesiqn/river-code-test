<template>
    <div>
        <h2>Bookings</h2>
        <form class="mb-3" @submit.prevent="addBooking">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your name" v-model="booking.name">
            </div>
            <div class="form-group">
                <input type="date" class="form-control" v-model="booking.date">
            </div>
            <div class="form-group">
                <input type="time" class="form-control"  v-model="booking.time">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Your message" v-model="booking.message">
            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>
        </form>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchBookings(pagination.prev_page_url)">Previous</a></li>
                <li class="disabled" ><a class="page-link">Page {{ pagination.current_page}} of {{ pagination.last_page }}</a></li>
                <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchBookings(pagination.next_page_url)">Next</a></li>
            </ul>
        </nav>
        <div class="card card-body m2" v-for="booking in bookings" v-bind:key="booking.id">
            <h3>{{ booking.name }}</h3>
            <span>Date: {{ booking.date }}</span>
            <span>Time: {{ booking.time }}</span>
            <p>Message: {{ booking.message }}</p>
            <hr>
            <button @click="deleteBooking(booking.id)" class="btn btn-danger">Delete</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookings: [],
            booking: {
                id: '',
                name: '',
                date: '',
                time: '',
                message: ''
            },
            booking_id: '',
            pagination: {},
            edit: false
        }
    },

    created() {
        this.fetchBookings();
    },

    methods: {
        fetchBookings(page_url) {
            let vm = this;
            page_url = page_url || '/api/bookings'
            fetch(page_url)
                .then(res => res.json())
                .then(res => {
                    this.bookings = res.data;
                    vm.makePagination(res.meta, res.links);
                })
        },
        makePagination(meta, links) {
            let pagination = {
                current_page: meta.current_page,
                last_page:meta.last_page,
                next_page_url: links.next,
                prev_page_url: links.prev
            };

            this.pagination = pagination;
        },
        deleteBooking(id) {
            if(confirm('Are you sure?')) {
                fetch(`api/booking/${id}`, {
                    method: 'delete'
                })
                .then(res => res.json())
                .then(data => {
                    alert('Booking removed');
                    this.fetchBookings();
                })
            }
        },
        addBooking() {
            fetch('api/booking', {
                method: 'post',
                body: JSON.stringify(this.booking),
                headers: {
                    'content-type': 'application/json'
                }
            })
            .then(res => res.json())
            .then(data => {
                this.booking.name = '';
                this.booking.date = '';
                this.booking.time = '';
                this.booking.message = '';
                alert('Booking Added');
                this.fetchBookings();
            })
        }
    }
}
</script>