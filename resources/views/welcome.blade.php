<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
   {{-- <script src="https://wagenaartje.github.io/neataptic/cdn/1.4.7/neataptic.js"></script>--}}
    <script src="//unpkg.com/brain.js"></script>
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
</head>
<body>

<script>
    const config = {
        binaryThresh: 0.5,
        hiddenLayers: [3], // array of ints for the sizes of the hidden layers in the network
        activation: 'sigmoid', // supported activation types: ['sigmoid', 'relu', 'leaky-relu', 'tanh'],
        leakyReluAlpha: 0.01, // supported for activation type 'leaky-relu'
    }

    // create a simple feed forward neural network with backpropagation
    const net = new brain.NeuralNetwork(config)

    net.train([
        { input: [0, 0], output: [0] },
        { input: [0, 1], output: [1] },
        { input: [1, 0], output: [1] },
        { input: [1, 1], output: [0] },
    ])

    const output = net.run([1, 0]) // [0.987]
    console.log(output);
</script>

<div id="app">
    <app-component></app-component>
</div>
{{--<button onclick="f()">нажми</button>--}}
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
