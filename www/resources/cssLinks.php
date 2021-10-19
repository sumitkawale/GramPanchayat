<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<meta http-equiv="x-ua-compatible" content="ie=edge" />

<link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">

<link href="..\resources\mdb\css\mdb.min.css" rel="stylesheet">

<style>

    select{
        transition-duration: .2s;
        border-width: .1rem !important;
    }
    select:focus {
        box-shadow: none !important;
    }
    @font-face {  
        font-family: kruti dev;  
        src: url('../resources/Kruti_Dev_010.ttf') format("truetype");  
    }  

    .hinditext {
        font-family: kruti dev;  
        font-size: auto;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    /* width */
    ::-webkit-scrollbar {
        width: 10px;
        height: .5rem;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #262626;
        transition-duration: 2s;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #51514e; 
    }

    .animate-hide {
        position : relative;
        animation: hide 4s forwards;
    }

    @keyframes hide {
        0% {
            display: block;
            opacity: 1;
        }

        80% {
            opacity: 0.95;
        }

        90% {
            transform: translateY(0px);
            opacity  : 0.9;
        }

        100% {
            opacity  : 0;
            transform: translateY(-200px);
            display  : none;
        }
    }

    .go-up {
        position : relative;
        animation: goUP 4s forwards;
    }

    @keyframes goUP {
        0% {
            display: block;
            opacity: 1;
        }

        80% {
            opacity: 1;
        }

        90% {
            transform: translateY(0px);
            opacity  : 1;
        }

        100% {
            opacity  : 1;
            transform: translateY(-125px);
        }
    }

    .full-alert{
        margin-left: -1.5rem; 
        margin-right:-1.5rem;
        border-radius: 0 0 .5rem .5rem !important;
    }
</style>