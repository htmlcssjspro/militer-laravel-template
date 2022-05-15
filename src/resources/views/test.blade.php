<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>

<body class="body">

    <svg width="200"
         height="100"
         viewBox="0 0 200 100"
         xmlns="http://www.w3.org/2000/svg">
        <path fill="none"
              stroke="lightgrey"
              d="M20,50 C20,-50 180,150 180,50 C180-50 20,150 20,50 z" />

        <circle r="5"
                fill="red">
            <animateMotion dur="10s"
                           repeatCount="indefinite"
                           path="M20,50 C20,-50 180,150 180,50 C180-50 20,150 20,50 z" />
        </circle>
    </svg>

    <svg width="120"
         height="120"
         viewBox="0 0 120 120"
         xmlns="http://www.w3.org/2000/svg"
         version="1.1"
         xmlns:xlink="http://www.w3.org/1999/xlink">

        <!-- Рисуем серый контур движения с двумя
       маленькими кружками в ключевых точках -->
        <path id="theMotionPath"
              stroke="lightgrey"
              stroke-width="2"
              fill="none"
              d="M10,110 A120,120 -45 0,1 110 10 A120,120 -45 0,1 10,110" />
        <circle cx="10"
                cy="110"
                r="3"
                fill="lightgrey" />
        <circle cx="110"
                cy="10"
                r="3"
                fill="lightgrey" />

        <!-- Рисуем красный круг, который будет перемещаться
       вдоль траектории движения. -->
        <circle cx=""
                cy=""
                r="5"
                fill="red">

            <!-- Определяем анимацию пути движения -->
            <animateMotion dur="6s"
                           repeatCount="indefinite">
                <mpath xlink:href="#theMotionPath" />
            </animateMotion>
        </circle>
    </svg>

    <svg width="120"
         height="120"
         viewBox="0 0 120 120"
         fill="none"
         xmlns="http://www.w3.org/2000/svg">

        <defs>
            <linearGradient id="linear1"
                            x1="0%"
                            y1="0%"
                            x2="100%"
                            y2="0%">
                <stop offset="0%"
                      stop-color="#05a" />
                <stop offset="50%"
                      stop-color="#a55" />
                <stop offset="100%"
                      stop-color="#0a5" />
            </linearGradient>

            <linearGradient id="linear"
                            x1="0%"
                            y1="0%"
                            x2="100%"
                            y2="0%">
                <stop offset="0%"
                      stop-color="red"
                      stop-opasity="1" />
                <stop offset="100%"
                      stop-color="white"
                      stop-opasity="0.1" />
            </linearGradient>
        </defs>

        <g id="circles">

            <circle id="big"
                    cx="60"
                    cy="60"
                    r="40"
                    fill="white"
                    stroke="url(#linear)"
                    stroke-width="20" />
            <circle id="small"
                    cx="60"
                    cy="20"
                    r="10"
                    fill="#EF6868">
                <animateTransform attributeName="transform"
                                  type="rotate"
                                  begin="0s"
                                  dur="3s"
                                  values="0 60 60; 360 60 60"
                                  repeatCount="indefinite" />
            </circle>
        </g>
    </svg>

</body>

</html>
