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
    <meta name="csrf-token" value="{{ csrf_token() }}"/>
</head>
<body>

{{--<script>
   /* const net = new brain.NeuralNetwork(config)*/

    const net = new brain.recurrent.LSTM(); //тип сети

    const data = [
        { input: 'Настоящая должностная инструкция определяет функциональные обязанности, права и ответственность Менеджера по персоналу.', output: 'Менеджер по персоналу' },
        { input: 'архитектора назначается лицо, имеющее высшее профессиональное образование без предъявления требований к стажу работы или среднее профессиональное образование и стаж работы по специальности не менее 2 лет', output: 'Архитектор' },
        { input: 'Курьер относится к категории рабочих, принимается на работу и увольняется приказом генерального директора компании.', output: 'Курьер' },
        { input: 'Энергетик отдела главного инженера службы начальника производства (далее энергетик) относится к категории руководителей.', output: 'Энергетик' },
        { input: 'Специалист диспетчерской управления информационно-технического обеспечения Владивостокского государственного университета экономики и сервиса.', output: 'Диспетчер' },
        { input: 'Стенографистка относится к категории технических исполнителей.', output: 'Стенографистки' },
        { input: 'На должность заведующего аспирантурой назначается лицо, имеющее высшее профессиональное образование и стаж научной или научно-педагогической работы по специальности не менее 3 лет.', output: 'Заведующий аспирантурой' },
        { input: 'Начальник цеха вправе: 1. Запрашивать и получать от руководителей структурных подразделений предприятия и специалистов необходимую информацию.', output: 'Нальник цеха' },
        { input: 'Начальник отдела должен знать: цели предприятия; распределение обязанностей между подразделениями предприятия,', output: 'Нальник отдела' },
        { input: 'ПОРЯДОК УТВЕРЖДЕНИЯ И ИЗМЕНЕНИЯ СОДЕРЖАНИЯ ДОЛЖНОСТНОЙ ИНСТРУКЦИИ.', output: 'Неопределенная должность' },
    ];

   const config = {
       iterations: 20000, // максимальное количество раз для повторения обучающих данных -> число больше 0
       errorThresh: 0.005, // допустимый процент ошибок из данных обучения -> число от 0 до 1
       log: false, // Значение true, чтобы использовать console.log, когда функция указана, она используется -> либо true, либо функция
       logPeriod: 10, // итерации между выходом из системы -> число больше 0
       learningRate: 0.3, // весы с дельтой для повышения скорости тренировки -> число от 0 до 1
       momentum: 0.1, // масштабируется со значением изменения следующего слоя -> число от 0 до 1
       callback: null, // a periodic call back that can be triggered while training --> null or function
       callbackPeriod: 10, // the number of iterations through the training data between callback calls --> number greater than 0
       timeout: 60000, // сейчас стоит 1 минута. максимальное количество миллисекунд для обучения -> число больше 0
   }

   const inputAi = net.train(data, config);
   console.log(inputAi);

   const outputAi = net.run('ПОРЯДОК УТВЕРЖДЕНИЯ И ИЗМЕНЕНИЯ СОДЕРЖАНИЯ ДОЛЖНОСТНОЙ ИНСТРУКЦИИ'); // 'happy'
    console.log(outputAi);
</script>--}}

<div id="app">
    <app-component></app-component>
</div>
{{--<button onclick="f()">нажми</button>--}}
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
