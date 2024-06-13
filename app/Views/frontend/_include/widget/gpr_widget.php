<style>
    /* START STYLE GPR WIDGET */
    #feedback {
        display: flex;
        position: fixed;
        left: 0;
        top: 0;
        bottom: 0;
        margin-left: -3px;
        margin-bottom: 0px;
        padding-top: 220px;
        z-index: 9000;
    }

    #feedback-form {
        float: left;
        width: 300px;
        height: 100%;
        padding-left: 5px;
        padding-right: 0px;
        background-clip: 'padding-box';
        border: 1px solid rgba(0, 123, 255, .2);
        -moz-border-radius: 0px;
        -webkit-border-radius: 0px;
        border-radius: 0px;
        -webkit-box-shadow: 0 5px 10px rgb(0 0 0 / 20%);
        -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
        box-shadow: 0 5px 10px rgb(0 0 0 / 20%);
        overflow: scroll;
    }

    #feedback-form textarea {
        resize: none;
    }

    @media (max-width: 767px) {
        #feedback-form {
            width: 250px;
        }
    }

    .button {
        float: left;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        width: 180px;
        height: 50px;
        background-color: #007bff;
        color: #fff;
        margin-top: 65px;
        margin-left: -65px;
        padding-top: 13px;
        -moz-border-radius: 0px 10px 10px 0px;
        -webkit-border-radius: 0px 10px 10px 0px;
        border-radius: 0px 0px 10px 10px;
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
        z-index: 9999;
    }

    .button:hover {
        /* background-color: #000;
        opacity: .5; */
        /* background-color: rgba(0, 0, 0, .5); */
        background-image: linear-gradient(to right, rgba(93, 23, 213, 0), rgba(93, 23, 213, 1));
        color: #fff;
    }

    .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button:hover span {
        padding-right: 25px;
    }

    .button:hover span:after {
        opacity: 1;
        right: 0;
    }

    /* END STYLE GPR WIDGET */
</style>

<!-- START GPR WIDGET -->
<div id="feedback">
    <div id="feedback-form" style="display: none;">
        <div id="gpr-kominfo-widget-container"></div>
    </div>
    <div class="button btn-gpr"><span>GPR Widget</span></div>
</div>
<!-- END GPR WIDGET -->