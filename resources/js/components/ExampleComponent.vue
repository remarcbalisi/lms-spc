<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">

                        <label>Your ID:</label><br/>
                        <textarea id="yourId"></textarea><br/>
                        <label>Other ID:</label><br/>
                        <textarea id="otherId"></textarea>
                        <button id="connect">connect</button><br/>

                        <label>Enter Message:</label><br/>
                        <textarea id="yourMessage"></textarea>
                        <button id="send">send</button>
                        <pre id="messages"></pre>

                        <video id="conference-video"></video>

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
        props: ['userRole'],
        mounted() {
            console.log('Component mounted.')
            this.getUserMedia = require('getusermedia')

            this.getUserMedia({video:true, audio: true}, (err, stream) =>  {
                if (err) return console.error(err)

                var Peer = require('simple-peer')
                var peer = new Peer({
                    initiator: this.userRole === 2,
                    trickle: false,
                    stream: stream,
                    config: {
                        iceTransportPolicy: "all",
                        iceServers: [
                            {
                                urls: "stun:lms.dedeket.com",
                                credential: 'test',
                                username: 'test'
                            },
                            {
                                urls: "turn:lms.dedeket.com",
                                credential: 'test',
                                username: 'test'
                            },
                            //{ urls: "stun:188.166.238.179:5349" },
                            //{ urls: "stun:stun.l.google.com:19302" },
                            //{ urls: "stun:global.stun.twilio.com:3478?transport=udp" }
                        ]
                    }
                })

                // peer.initiator = this.userRole === 2;
                peer.on('signal', function (data) {
                    document.getElementById('yourId').value = JSON.stringify(data)
                })

                document.getElementById('connect').addEventListener('click', function () {
                    var otherId = JSON.parse(document.getElementById('otherId').value)
                    peer.signal(otherId)
                })

                document.getElementById('send').addEventListener('click', function () {
                    var yourMessage = document.getElementById('yourMessage').value
                    peer.send(yourMessage)
                })

                peer.on('data', function (data) {
                    document.getElementById('messages').textContent += data + '\n'
                })

                peer.on('stream', function (stream) {
                    var video = document.getElementById('conference-video')
                    // document.body.appendChild(video)

                    try {
                        video.srcObject = stream;
                    } catch (error) {
                        video.src = window.URL.createObjectURL(stream);
                    }
                    // video.src = window.URL.createObjectURL(stream)
                    video.play()
                })

            })
        }
    }
</script>
