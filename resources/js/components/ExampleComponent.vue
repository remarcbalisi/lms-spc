<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                getUserMedia: null,
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getUserMedia = require('getusermedia')

            this.getUserMedia({video:true, audio: true}, function (err, stream) {
                if (err) return console.error(err)

                var Peer = require('simple-peer')
                var peer = new Peer({
                    initiator: location.hash === '#init',
                    trickle: false,
                    stream: stream
                })

            })
        }
    }
</script>
