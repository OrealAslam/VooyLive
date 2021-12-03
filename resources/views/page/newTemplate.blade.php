@extends('layouts.metroReportLayout')
@section('content')

<div class="container">
    <div class="top-header section" id="top-header">
        <div class="row">
            <table width="100%">
                <tr>
                    <td width="25%">
                        <img src="/img/client-logo.jpeg" class="top-logo img-responsive">
                    </td>
                    <td width="75%" class="header-title">
                        <span>COMMUNITY FEATURE SHEET <sup>&reg</sup></span>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row">
            <hr class="style1">
        </div>
    </div>


    <div class="header section" id="header">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 address">
                <span>1775 E 47th Ave Vancouver, BC</span>
            </div>
        </div>
        <div class="row">
            <hr class="style1">
        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="row bg-color1 no-margin quote-container">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                        <svg style="enable-background:new 0 0 32 24;" version="1.1" viewBox="0 0 32 24" class="fill2" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Layer_1"/><g id="left_x5F_quote"><g><path d="M32,24V12h-8c0-4.41,3.586-8,8-8V0c-6.617,0-12,5.383-12,12v12H32z"/><path d="M12,24V12H4c0-4.41,3.586-8,8-8V0C5.383,0,0,5.383,0,12v12H12z"/></g></g></svg>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 quote">
                        <span class="color2">
                            YOU DON’T BUY THE HOUSE; YOU BUY THE NEIGHBOURHOOD!
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="neighbourhood-title">
                    NAME OF NEIGHBOURHOOD
                </div>
                <div class="neighbourhood-name">
                    VICTORIA-FRASERVIEW
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style3">
        </div>
    </div>
    <div class="community-profile section" id="community-profile">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    COMMUNITY<br>
                    PROFILE
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 right-side">
                <ul>
                    <li>
                    Victoria-Fraserview stretches up from the Fraser River to East 41st Avenue and is bordered by Knight Street to the west and the Fraserview Golf Course on Vivian Drive to the east.The main road Victoria Drive has an eclectic mix of stores and mom-and-pop restaurants.
                    </li>
                    <li>
                    Known for its tree-lined, quiet family streets, parents can relax and enjoy this safe and convenient neighborhood while catering to the needs of the entire family through quality schools and excellent shopping.
                    </li>
                    <li>
                    According to WalkScore.com, this property has good walk, transit and bike ratings, with a scores in the 65% percentile and above. Residents can easily get around this area without a car.
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="location section" id="location">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    LOCATION
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="row">
                    <div id="neighborhoods-map-container">
                        <div id="neighborhoods-map">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="row">
                    <div class="location-welcome bg-color1 color2">
                        WELCOME HOME
                    </div>
                    <div class="welcome-text">
                        <p>A communityis a place that people call home. It’s a place to work, play, learn, share and relax.</p>
                        <p>This Community Feature Sheet® is designed to help you to get to know this community.</p>
                        <p>Who knows, maybe someday soon you will call this exceptional community home.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="demographics section pageBreakAfter" id="demographics">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    DEMOGRAPHICS
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 demographics-text bg-color1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text color2">
                                HOUSEHOLDS WITH CHILDREN
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 percent1 color2">
                                66%
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 text color2">
                                MEDIAN AGE
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 percent2 color2">
                                42
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 education">
                        <div class="row color1">
                            <div class="col-lg-12 col-md-12 col-sm-12 avg-household-size">
                                <div class="row bg-color1">
                                    <div class="col-lg-5 col-md-5 col-sm-5 icon bg-color2">
                                        <svg class="fill2" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 503.303 503.303" style="enable-background:new 0 0 503.303 503.303;" xml:space="preserve">
                                            <g>
                                                <g>
                                                    <path d="M317.684,135.826c18.111,0,34.726-11.714,40.791-28.789c6.133-17.265,0.432-37.017-13.901-48.398
                                                        c-14.353-11.397-34.982-12.409-50.374-2.447c-15.346,9.933-22.909,28.971-18.541,46.731c4.31,17.514,19.624,30.839,37.565,32.675
                                                        C314.705,135.751,316.194,135.826,317.684,135.826z"></path>
                                                    <path d="M450.886,243.572c8.98,0,17.565-4.444,22.766-11.765c5.273-7.424,6.576-17.219,3.435-25.769
                                                        c-3.054-8.31-10.088-14.831-18.609-17.234c-8.757-2.47-18.39-0.438-25.392,5.369c-6.956,5.767-10.729,14.719-10.018,23.726
                                                        c0.705,8.898,5.792,17.077,13.433,21.683C440.827,242.191,445.835,243.572,450.886,243.572z"></path>
                                                    <path d="M503.282,332.769c-0.021-3.182,0.063-6.366-0.112-9.545c-0.179-3.244-0.488-6.479-0.765-9.718
                                                        c-0.546-6.404-2.084-12.688-3.602-18.916c-0.76-3.11-1.91-6.261-3.079-9.242c-1.164-2.971-2.521-5.896-4.076-8.682
                                                        c-3.083-5.521-6.577-10.664-11.011-15.206c-2.941-3.014-6.211-5.62-9.632-8.059c-2.679-1.908-5.469-3.677-8.477-5.022
                                                        c-3.469-1.551-7.208-2.508-11.021-2.532c-4.657-0.029-9.188,1.351-13.244,3.588c-3.443,1.899-6.359,4.429-9.377,6.917
                                                        c-3.12,2.57-6.34,5.019-9.648,7.342c-6.038,4.241-12.834,8.857-20.249,10.136c0.132-13.097-0.249-26.291-2.229-39.253
                                                        c-0.973-6.36-2.005-12.801-3.654-19.025c-1.626-6.139-3.543-12.141-5.854-18.061c-4.339-11.114-10.012-21.553-17.612-30.782
                                                        c-6.819-8.279-14.945-15.516-24.202-20.967c-10.021-5.9-21.427-9.503-33.146-8.285c-11.331,1.178-21.236,7.098-30.146,13.863
                                                        c-12.393,9.41-22.752,21.518-29.917,35.344c-7.488-18.776-20.322-35.944-37.94-46.263c-9.682-5.67-20.917-9.606-32.213-9.762
                                                        c-11.894-0.165-23.754,3.942-33.892,9.972c-20.059,11.931-33.539,32.2-40.536,54.127c-7.348,23.023-8.255,47.768-6.295,71.697
                                                        c0.192,2.35,0.414,4.696,0.664,7.041c-5.769-1.399-11.159-4.537-16.117-7.7c-5.278-3.367-10.556-6.972-15.211-11.166
                                                        c-3.89-3.504-8.604-6.083-13.825-6.839c-4.061-0.589-8.188-0.068-12.092,1.132c-21.281,6.546-35.32,26.732-40.576,47.558
                                                        c-1.581,6.266-2.846,12.543-3.445,18.985C0.145,321.97,0.047,328.449,0,334.998c-0.018,2.483,0.375,4.708,2.061,6.639
                                                        c1.492,1.709,3.652,2.782,5.927,2.862c4.659,0.163,8.122-3.533,8.57-7.97c0.563-5.568,1.054-11.124,2.06-16.633
                                                        c1.04-5.693,2.509-11.18,4.406-16.645c-0.538,9.938-1.076,19.876-1.614,29.814c-0.068,1.265-0.137,2.528-0.205,3.794
                                                        c-0.142,2.62,0.056,5.262,0.568,7.833c0.279,1.398,0.653,2.779,1.12,4.128c0.234,0.675,0.491,1.342,0.771,2
                                                        c0.222,0.521,0.882,1.399,0.91,1.947c0.091,1.76,0.183,3.52,0.273,5.279c0.547,10.563,1.094,21.125,1.641,31.688
                                                        c0.655,12.646,1.31,25.291,1.965,37.938c0.226,4.362,0.451,8.727,0.678,13.09c0.1,1.935,0.04,3.973,0.373,5.89
                                                        c0.777,4.475,4.792,7.974,9.343,8.071c4.606,0.098,8.779-3.315,9.673-7.822c0.459-2.312,0.337-4.836,0.45-7.176
                                                        c0.561-11.592,1.122-23.186,1.683-34.777c0.491-10.146,0.982-20.291,1.474-30.438c0.032-0.659,0.063-1.318,0.096-1.979
                                                        c0.38,7.338,0.76,14.676,1.14,22.014c0.652,12.6,1.305,25.197,1.957,37.797c0.2,3.858,0.4,7.718,0.6,11.575
                                                        c0.033,0.64,0.051,1.281,0.104,1.918c0.385,4.53,4.106,8.34,8.625,8.834c4.594,0.505,9.021-2.556,10.304-6.973
                                                        c0.302-1.041,0.358-2.083,0.41-3.151c0.146-3.029,0.293-6.059,0.439-9.089c0.568-11.751,1.138-23.503,1.706-35.254
                                                        c0.575-11.886,1.15-23.771,1.726-35.657c0.154-3.196,0.31-6.395,0.464-9.592c0.037-0.77,0.02-1.177,0.379-1.859
                                                        c2.618-4.97,3.845-10.612,3.541-16.221c-0.498-9.199-0.996-18.398-1.494-27.598c-0.401-7.409-0.803-14.818-1.204-22.228
                                                        c5.635,2.257,11.787,4.303,17.862,4.881c3.08,0.293,6.302,0.349,9.347-0.284c1.414-0.294,2.853-0.698,4.185-1.262
                                                        c0.343-0.145,0.677-0.309,1.007-0.479c0.277,0.042,0.556,0.075,0.835,0.099c0.638,0.055,1.28,0.059,1.919,0.014
                                                        c4.426-0.313,8.48-3.046,10.511-6.978c1.072-2.075,1.462-4.32,1.364-6.639c-0.128-3.059-0.211-6.118-0.239-9.179
                                                        c-0.114-12.078,0.601-24.202,2.746-36.102c2.156-11.958,5.701-23.863,11.647-34.512c-0.845,6.979-1.69,13.958-2.535,20.937
                                                        c-1.538,12.696-3.075,25.392-4.613,38.088c-0.561,4.629-1.121,9.259-1.682,13.888c-0.386,3.187-0.823,6.354-0.862,9.571
                                                        c-0.069,5.695,0.831,11.399,2.673,16.79c0.922,2.698,2.078,5.316,3.456,7.813c0.665,1.206,1.383,2.384,2.148,3.528
                                                        c0.186,0.275,0.188,0.181,0.196,0.341c0.069,1.466,0.139,2.933,0.208,4.398c0.401,8.452,0.802,16.904,1.203,25.356
                                                        c0.595,12.555,1.19,25.108,1.786,37.664c0.604,12.75,1.209,25.5,1.813,38.25c0.429,9.038,0.857,18.076,1.286,27.115
                                                        c0.09,1.905,0.181,3.812,0.271,5.718c0.302,6.362,4.513,12.023,10.669,13.885c9.01,2.725,18.543-4.176,18.963-13.541
                                                        c0.07-1.573,0.142-3.146,0.212-4.719c0.44-9.818,0.881-19.636,1.32-29.455c0.584-13.015,1.168-26.03,1.751-39.045
                                                        c0.421-9.374,0.841-18.748,1.262-28.121c0.054-1.208,0.108-2.417,0.162-3.626c0.262,5.605,0.522,11.212,0.783,16.818
                                                        c0.571,12.259,1.143,24.518,1.713,36.775c0.563,12.071,1.125,24.142,1.688,36.211c0.178,3.827,0.356,7.654,0.534,11.481
                                                        c0.104,2.221,0.066,4.542,0.641,6.702c2.436,9.167,13.192,13.938,21.515,9.244c4.783-2.698,7.418-7.585,7.664-12.972
                                                        c0.281-6.157,0.563-12.312,0.844-18.47c0.529-11.589,1.059-23.178,1.588-34.769c0.6-13.134,1.199-26.269,1.8-39.401
                                                        c0.493-10.792,0.985-21.584,1.479-32.377c0.209-4.563,0.417-9.125,0.625-13.688c0.01-0.196,0.433-0.667,0.541-0.839
                                                        c0.355-0.562,0.699-1.129,1.032-1.704c0.721-1.248,1.388-2.527,1.998-3.833c1.181-2.528,2.146-5.157,2.88-7.849
                                                        c1.512-5.542,2.03-11.34,1.543-17.063c-0.207-2.434-0.557-4.86-0.851-7.285c-1.367-11.292-2.734-22.585-4.103-33.877
                                                        c-1.321-10.913-2.644-21.826-3.965-32.738c-0.173-1.424-0.345-2.849-0.518-4.274c5.556,10.266,8.989,21.555,11.035,33.013
                                                        c2.077,11.628,2.88,23.488,2.606,35.287c-0.074,3.212-0.005,6.426,0.026,9.639c-0.072,2.109-0.025,4.113,0.715,6.126
                                                        c1.563,4.25,5.374,7.522,9.857,8.275c4.504,0.756,9.178-1.062,12.115-4.529c3.415-4.029,3.167-9.314,3.576-14.291
                                                        c0.786-9.553,2.335-19.086,4.522-28.413c2.155-9.189,4.879-18.354,8.89-26.919c0,2.432,0,4.864,0,7.296
                                                        c0,0.962,0.146,2.018-0.053,2.967c-0.416,2-0.832,3.999-1.248,5.998c-2.026,9.737-4.052,19.475-6.078,29.212
                                                        c-2.664,12.805-5.329,25.609-7.993,38.414c-2.158,10.37-4.314,20.74-6.474,31.11c-0.531,2.554-1.063,5.106-1.594,7.659
                                                        c-0.133,0.639-0.279,1.271-0.33,1.922c-0.381,4.877,3.604,9.013,8.442,9.013c5.256,0,15.517,0,15.517,0l2.515,0.025
                                                        c0,0,0.071,1.627,0.107,2.367c0.441,9.153,0.886,18.309,1.327,27.461c0.628,12.962,1.256,25.925,1.883,38.886
                                                        c0.417,8.625,0.834,17.249,1.252,25.873c0.024,0.523,0.05,1.048,0.075,1.571c0.198,4.103,2.199,7.993,5.309,10.653
                                                        c3.489,2.986,8.237,4.271,12.744,3.303c4.383-0.941,8.202-3.913,10.261-7.888c1.501-2.901,1.629-5.902,1.791-9.046
                                                        c0.198-3.813,0.396-7.625,0.593-11.438c0.635-12.246,1.269-24.49,1.902-36.736c0.602-11.614,1.203-23.229,1.805-34.842
                                                        c0.157-3.022,0.312-6.047,0.47-9.069c0.03-0.573-0.185-1.119,0.442-1.119c1.353,0,1.307-0.239,1.36,0.893
                                                        c0.39,8.017,0.776,16.031,1.164,24.047c0.625,12.923,1.251,25.848,1.876,38.771c0.47,9.686,0.938,19.371,1.406,29.057
                                                        c0.137,2.818,0.153,5.576,1.249,8.249c3.619,8.826,14.769,12.24,22.565,6.629c3.666-2.639,6.062-6.869,6.298-11.396
                                                        c0.026-0.439,0.046-0.878,0.067-1.317c0.162-3.131,0.324-6.261,0.486-9.392c0.606-11.707,1.213-23.413,1.818-35.119
                                                        c0.631-12.175,1.262-24.351,1.892-36.525c0.192-3.717,0.385-7.433,0.578-11.148c0.042-0.82,0.127-2.708,0.127-2.708
                                                        s12.411-0.037,17.521-0.037c5.225,0,9.224-4.875,8.23-10.001c-0.065-0.363-0.146-0.724-0.221-1.084
                                                        c-1.474-7.231-2.945-14.462-4.418-21.694c-2.512-12.331-5.022-24.662-7.533-36.993c-2.421-11.888-4.842-23.774-7.263-35.663
                                                        c-1.202-5.901-2.403-11.802-3.605-17.703c-0.169-0.832-0.029-1.792-0.029-2.635c0-1.988,0-3.976,0-5.963
                                                        c2.464,5.846,4.362,11.851,6.01,17.973c1.695,6.311,3.107,12.682,4.051,19.152c0.938,6.438,1.683,12.875,2.22,19.358
                                                        c0.194,2.347,0.291,4.653,1.258,6.842c0.901,2.039,2.346,3.823,4.132,5.154c2.464,1.836,5.552,2.771,8.621,2.543
                                                        c0.877-0.065,1.528,0.594,2.304,1.005c0.893,0.475,1.825,0.872,2.781,1.201c2.001,0.688,4.049,1.072,6.159,1.172
                                                        c8.529,0.397,17.008-2.376,24.747-5.74l-0.014,18.764l-7.659,32.564c-2.614,11.113-5.229,22.226-7.843,33.339
                                                        c-0.616,2.621-2.005,6-0.576,8.546c1.674,2.982,4.789,2.729,7.69,2.729c2.994,0,5.986,0,8.98,0c0.104,0,1.253-0.047,1.257,0.029
                                                        c0.013,0.247,0.023,0.494,0.035,0.741c0.066,1.369,0.133,2.738,0.199,4.107c0.252,5.211,0.504,10.421,0.756,15.632
                                                        c0.585,12.089,1.17,24.179,1.755,36.269c0.125,2.582-0.021,5.375,0.489,7.925c0.893,4.455,4.986,7.86,9.544,7.838
                                                        c4.604-0.023,8.695-3.534,9.473-8.063c0.437-2.535,0.338-5.238,0.471-7.798c0.288-5.563,0.576-11.129,0.863-16.693
                                                        c0.607-11.739,1.217-23.479,1.823-35.219c0.07-1.348,0.141-2.697,0.21-4.045c0.013-0.234,0.024-0.469,0.036-0.703
                                                        c-0.003,0.06,0.958-0.25,0.976,0.098c0.142,2.917,0.281,5.834,0.424,8.751c0.598,12.365,1.195,24.73,1.795,37.096
                                                        c0.229,4.75,0.46,9.499,0.688,14.249c0.048,0.989,0.097,1.978,0.145,2.966c0.16,3.31,1.981,6.345,4.842,8.031
                                                        c4.021,2.372,9.211,1.404,12.206-2.147c1.521-1.802,2.181-3.965,2.301-6.277c0.183-3.514,0.363-7.025,0.546-10.538
                                                        c0.647-12.502,1.295-25.004,1.941-37.506c0.223-4.29,0.444-8.578,0.667-12.865c0.005-0.101,0.077-1.876,0.102-1.876
                                                        c2.382,0,4.766,0,7.147,0c2.427,0,5.703,0.515,7.811-0.943c2.039-1.41,2.564-3.771,2.064-6.056
                                                        c-0.697-3.188-1.395-6.376-2.091-9.564c-2.649-12.117-5.3-24.235-7.948-36.352c-1.77-8.085-5.516-24.414-5.516-24.414l0.018-6.208
                                                        c5.259,11.762,6.726,24.753,8.002,37.428c0.213,2.112,0.717,4.016,2.177,5.636c1.506,1.671,3.667,2.708,5.92,2.78
                                                        c4.588,0.146,8.54-3.75,8.516-8.329C503.295,335.032,503.288,333.9,503.282,332.769z"></path>
                                                    <path d="M52.407,243.572c8.981,0,17.567-4.443,22.768-11.765c5.272-7.424,6.575-17.219,3.434-25.769
                                                        c-3.054-8.31-10.087-14.831-18.61-17.234c-8.757-2.47-18.388-0.438-25.39,5.369c-6.956,5.767-10.73,14.719-10.018,23.726
                                                        c0.705,8.898,5.792,17.077,13.433,21.683C42.35,242.191,47.357,243.572,52.407,243.572z"></path>
                                                    <path d="M181.604,128.256c18.138,0,34.726-11.88,40.545-29.067c5.881-17.37-0.267-37.044-14.935-48.018
                                                        c-14.693-10.993-35.415-11.25-50.374-0.619c-14.929,10.609-21.55,30.111-16.112,47.617c5.374,17.304,21.642,29.604,39.75,30.072
                                                        C180.854,128.252,181.229,128.256,181.604,128.256z"></path>
                                                </g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                            <g>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 text color2">
                                        AVERAGE HOUSEHOLD SIZE
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 education-title">
                                EDUCATION
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 education-graph">
                                <script type="text/javascript">
                                  google.charts.load('current', {'packages':['corechart']});
                                  google.charts.setOnLoadCallback(drawChart);
                                  /*
                                    $(window).resize(function(){
                                        drawChart();
                                    });
                                    */
                                  function drawChart() {

                                    var data = google.visualization.arrayToDataTable([
                                      ['Task', 'Education Distribution'],
                                      ['UNIVERSITY', 17 ],
                                      ['DIPLOMA', 9 ],
                                      ['TRADE', 13 ],
                                      ['HIGH SCH', 30 ],
                                      ['NO CERT', 31 ]
                                    ]);
                                    var options = {
                                        //height:document.getElementById('edulist').offsetWidth,
                                        //height:212,
                                        pieSliceText:'percentage',
                                        //width:document.getElementById('edulist').offsetWidth,
                                        //width:190,
                                        legend:{position:'top',maxLines:5}
                                      
                                    }

                                    var chart = new google.visualization.PieChart(document.getElementById('edulist'));

                                    chart.draw(data, options);
                                  }
                                  /*
                                    function resizeChart () {
                                        chart.draw(data, options);
                                    }
                                    if (document.addEventListener) {
                                        window.addEventListener('resize', resizeChart);
                                    }
                                    else if (document.attachEvent) {
                                        window.attachEvent('onresize', resizeChart);
                                    }
                                    else {
                                        window.resize = resizeChart;
                                    }
                                */

                                </script>
                                <div id="edulist"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 age-distb">
                        <div class="row color1">
                            <div class="col-lg-12 col-md-12 col-sm-12 avg-household-size">
                                <div class="row bg-color2 value color2">
                                    2.89
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 age-distb-title">
                                AGE DISTRIBUTION
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 age-graph">
                                <script type="text/javascript">
                                      google.charts.load('current', {'packages':['corechart']});
                                      google.charts.setOnLoadCallback(drawChart);

                                      function drawChart() {

                                        var data = google.visualization.arrayToDataTable([
                                          ['Task', 'Age Distribution'],
                                          ['0-4',  4],
                                          ['5-9', 4] ,
                                          ['10-19', 11] ,
                                          ['20-34', 23] ,
                                          ['50-54', 8] ,
                                          ['55-64', 13],
                                          ['65-69', 4],
                                          ['70-79', 6],
                                          ['80+',5]
                                        ]);

                                        var options = {
                                          //height:document.getElementById('agedist').offsetWidth,
                                          //height:212,
                                          //width:document.getElementById('agedist').offsetWidth,
                                          //width:250,
                                         legend:{position:'top',maxLines:3}
                                          
                                        };

                                        var chart = new google.visualization.PieChart(document.getElementById('agedist'));

                                        chart.draw(data, options);
                                      }

                                </script>
                                <div id="agedist" ></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Page 1 -->
    <!-- Start of Page 2 -->
    <div class="page2-head section" id="page2-head">
        <div class="row">
            <hr class="style4">
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 title1 bg-color2 color2">
                V5P 1P9
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 title2 bg-color3 color2">
                1775 E 47TH AVE
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="getting-arround section" id="getting-arround">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    GETTING AROUND
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="text">
                            The following scores, calculated out of 100, show how easy it is to get around this community without a vehicle.
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="info">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                                    <div class="row">
                                        <div class="bg-color1 color2 item">
                                            <div class="item-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                                <g><path d="M571.7,406.4l10.9-117.1l56.7,80c3.8,5.5,6.4,5.8,10.3,6.3l107.8,4.7c34.5-2.4,29.7,61.5,6.3,69.3l-125.6,8.5c-20.5,3.4-31.9-4.6-42.8-20.7L571.7,406.4L571.7,406.4z M547,751.1l-26.1,157.5c-3,18.2-10.3,45.5-5.8,63.3c2.2,8.7,11.6,17.5,19.1,17.7h142.5c4.4-0.2,7.1-2.1,7-7l0-14.9c0.1-8.9-5-14.1-13.5-16.8l-46.4-14.3c-4.3-2.3-6.3-6.3-6-12l45.8-193.4c3.1-18.8-2.9-39.1-13.5-52.2L549.3,545.7c-3.7-4.7-3-10.6-2.7-16.3l26.7-233.7c4.1-85.8-98.6-115.9-155.2-50.8L311.7,354.5c-7.8,8-21.1,23.3-25.7,33.1l-53.8,116.1c-7.4,15.9-18.1,46.6-13.6,64.5c1.8,7.2,6.3,12.9,15,16.9c17.7,8.1,35.3,13.7,45.4-5.1L350,435.3c2.9-6,7-11.3,12.3-15.8c33.3-28,66.6-56,100-83.9c5.6-4.7,12.7,4,7.1,8.8l-69.9,69.1l-6.3,110.5c-1.2,20.7,2.9,48.2,17.9,63.4c43,43.5,89.7,101.1,131.6,144.9C551,741.1,549.1,738.8,547,751.1L547,751.1L547,751.1z M400.3,603.3l83.4,83.6c-10.8,21.1-22.1,41.8-33.4,62.6c-31.2,57.5-70.8,128.8-90.5,189.9l48.7,12c8.6,2.6,13.6,7.9,13.5,16.8l0,14.9c0.1,4.8-2.6,6.7-7,7H274c-13.3-1.5-19.8-20.6-19.9-30.3c0.8-18,8.9-40.4,14.6-57.9c22.8-69.2,50.9-146.2,84.2-207.6C369.3,664,385.7,633.8,400.3,603.3L400.3,603.3L400.3,603.3z M592.3,155.6c-12.6,34.9-42.5,46.5-76.2,40.6c-24.4-4.2-50.4-23.5-60.9-45.3c-9.6-19.9-10.2-65.1-7.3-85.8c10-72.7,127.3-67.3,150.1-20.1c3.6,7.4,5.8,16.3,6.3,27.1C605.1,90.2,600.6,132.7,592.3,155.6L592.3,155.6z"/></g>
                                                </svg>
                                            </div>
                                            WALK<br>
                                            SCORE<br>
                                            <span class="value color2">80</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                                    <div class="row">
                                        <div class="bg-color1 color2 item">
                                            <div class="item-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                                <g><path d="M794.1,833.2h-47L872.4,990H715.7l-94.1-156.8H378.5l-94,156.8H127.6L253,833.2h-47.1c-43.2,0-78.4-35.1-78.4-78.4v-588c0-43.3,35.2-78.4,78.4-78.4h156.9c0-43.3,35.1-78.4,78.4-78.4h117.6c43.3,0,78.4,35.1,78.4,78.4h156.9c43.2,0,78.4,35.1,78.4,78.4v588C872.4,798.1,837.3,833.2,794.1,833.2L794.1,833.2L794.1,833.2z M304,754.8c32.5,0,58.9-26.3,58.9-58.8s-26.4-58.9-58.9-58.9c-32.5,0-58.8,26.4-58.8,58.9C245.2,728.5,271.5,754.8,304,754.8L304,754.8z M754.8,205.9H245.2v313.7h509.6V205.9L754.8,205.9z M696,637.2c-32.5,0-58.9,26.4-58.9,58.9c0,32.5,26.4,58.8,58.9,58.8c32.5,0,58.8-26.3,58.8-58.8S728.5,637.2,696,637.2L696,637.2z"/></g>
                                                </svg>
                                            </div>
                                            TRANSIT<br>
                                            SCORE<br>
                                            <span class="value color2">66</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                                    <div class="row">
                                        <div class="bg-color1 color2 item">
                                            <div class="item-icon">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                                <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                                <g><path d="M589.3,241.2c40.7,0,73.8-32.9,73.8-73.6c0-40.7-33.1-73.8-73.8-73.8c-40.7,0-73.8,33.1-73.8,73.8C515.5,208.4,548.6,241.2,589.3,241.2z M735,420.1c44.2,0,44.2-57.7,0-57.7l-123.2,0.2l-81-126.9c0,0-17.2-28.5-49.8-28.5c0,0-27.1-3.5-46.3,18.4L278.7,381.9c-10.1,10.9-15.9,25.4-15.9,41.3c0,23,12.9,43.4,31.8,53.9l158.9,88.3v166.1c0,23.4,19,42.6,42.5,42.6c23.5,0,42.6-19.1,42.6-42.6V524c0,0,5.6-33.1-32.1-51.1l-91.7-48.2l98.9-97.9l47.9,75c8.4,13.3,20,18.7,30.7,18.4L735,420.1L735,420.1z M788.9,504c-111.1,0-201.3,89.9-201.3,201c0,111.2,90.2,201.1,201.3,201.1C899.8,906.1,990,816.2,990,705C990,593.9,899.8,504,788.9,504z M788.8,851.3c-80.8,0-146.3-65.4-146.3-146.3c0-80.7,65.6-146.2,146.3-146.2c80.7,0,146.4,65.4,146.4,146.2C935.2,785.9,869.5,851.3,788.8,851.3z M211.1,504C100.3,504,10,593.9,10,705c0,111.1,90.3,201.1,201.1,201.1c111.3,0,201.4-89.9,201.4-201.1C412.4,593.9,322.3,504,211.1,504z M211.1,851.3c-80.7,0-146.2-65.5-146.2-146.3c0-80.7,65.5-146.1,146.2-146.1c80.8,0,146.5,65.5,146.5,146.1C357.6,785.8,292,851.3,211.1,851.3z"/></g>
                                                </svg>
                                            </div>
                                            BIKE<br>
                                            SCORE<br>
                                            <span class="value color2">100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="public-schools section" id="public-schools">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    PUBLIC SCHOOLS
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 school-item-container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row item school1">
                            <div class="school-head icon bg-color2">
                                <svg version="1.1" id="Capa_1" class="fill2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 31.759 31.759" style="enable-background:new 0 0 31.759 31.759;"
                                     xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M16.658,10.067h9.986l4.836-3.979l-4.836-3.979h-9.986V0h-2.887v2.108H2.096v7.959h11.675v19.227h-2.91v2.024h8.627
                                            v-2.024h-2.83V10.067z M2.999,9.164V3.013h23.322l3.737,3.075l-3.737,3.076H2.999z"/>
                                        <path d="M7.953,5.975c-0.086-0.07-0.184-0.128-0.294-0.174C7.55,5.755,7.437,5.716,7.322,5.683
                                            C7.206,5.65,7.094,5.623,6.984,5.599c-0.11-0.023-0.208-0.05-0.295-0.08S6.531,5.455,6.48,5.417
                                            C6.428,5.378,6.402,5.328,6.402,5.266c0-0.053,0.013-0.097,0.038-0.131C6.465,5.1,6.497,5.072,6.535,5.053
                                            c0.039-0.021,0.082-0.036,0.129-0.046c0.047-0.008,0.093-0.012,0.138-0.012c0.062,0,0.124,0.006,0.187,0.02
                                            c0.062,0.013,0.117,0.034,0.167,0.064c0.048,0.03,0.088,0.068,0.118,0.118c0.03,0.049,0.042,0.108,0.04,0.18h0.825
                                            c0-0.178-0.037-0.332-0.111-0.46c-0.074-0.129-0.17-0.235-0.289-0.318C7.621,4.517,7.486,4.455,7.333,4.415
                                            C7.18,4.375,7.026,4.354,6.869,4.354c-0.148,0-0.3,0.019-0.454,0.054C6.261,4.443,6.122,4.501,5.998,4.576
                                            C5.873,4.654,5.772,4.753,5.693,4.877C5.614,5,5.575,5.146,5.575,5.318c0,0.146,0.027,0.27,0.083,0.373
                                            c0.055,0.101,0.125,0.187,0.213,0.257c0.087,0.07,0.186,0.126,0.298,0.171c0.11,0.044,0.222,0.083,0.335,0.116
                                            c0.116,0.032,0.227,0.06,0.335,0.086C6.947,6.345,7.044,6.375,7.13,6.407c0.086,0.032,0.155,0.071,0.207,0.116
                                            c0.052,0.044,0.078,0.102,0.078,0.174c0,0.059-0.015,0.109-0.044,0.15c-0.029,0.041-0.068,0.075-0.116,0.1
                                            C7.208,6.973,7.154,6.991,7.093,7.003C7.032,7.016,6.971,7.021,6.909,7.021c-0.178,0-0.32-0.036-0.427-0.107
                                            C6.376,6.843,6.318,6.715,6.309,6.527H5.482c0,0.205,0.037,0.378,0.113,0.52C5.671,7.191,5.772,7.307,5.9,7.399
                                            c0.127,0.092,0.273,0.159,0.438,0.2C6.503,7.641,6.676,7.662,6.86,7.662c0.175,0,0.345-0.018,0.511-0.054
                                            c0.166-0.035,0.313-0.094,0.442-0.176c0.129-0.08,0.233-0.19,0.311-0.326C8.202,6.969,8.242,6.8,8.242,6.6
                                            c0-0.144-0.027-0.266-0.081-0.367C8.109,6.129,8.039,6.044,7.953,5.975z"/>
                                        <path d="M9.526,5.359c0.06-0.089,0.136-0.16,0.229-0.214c0.093-0.053,0.207-0.079,0.34-0.079c0.175,0,0.319,0.041,0.434,0.123
                                            c0.114,0.084,0.183,0.205,0.207,0.365h0.827c-0.006-0.189-0.053-0.359-0.14-0.51c-0.087-0.148-0.199-0.274-0.335-0.377
                                            c-0.136-0.103-0.29-0.18-0.46-0.233c-0.17-0.054-0.341-0.08-0.512-0.08c-0.24,0-0.458,0.043-0.654,0.129
                                            C9.267,4.568,9.1,4.686,8.962,4.837C8.821,4.986,8.716,5.161,8.641,5.361C8.568,5.561,8.53,5.777,8.53,6.008
                                            c0,0.231,0.037,0.446,0.111,0.647c0.075,0.199,0.18,0.374,0.318,0.525c0.138,0.149,0.305,0.267,0.5,0.352
                                            c0.195,0.087,0.414,0.13,0.654,0.13c0.201,0,0.387-0.028,0.56-0.088c0.171-0.057,0.321-0.142,0.448-0.252
                                            c0.128-0.112,0.23-0.248,0.307-0.409s0.121-0.345,0.133-0.549h-0.827c-0.015,0.184-0.076,0.328-0.184,0.431
                                            c-0.108,0.104-0.26,0.156-0.456,0.156c-0.133,0-0.247-0.027-0.34-0.08C9.661,6.818,9.585,6.745,9.526,6.656
                                            C9.467,6.567,9.424,6.467,9.397,6.355c-0.027-0.114-0.04-0.229-0.04-0.348c0-0.119,0.013-0.234,0.04-0.347
                                            C9.424,5.549,9.466,5.448,9.526,5.359z"/>
                                        <polygon points="13.908,5.577 12.819,5.577 12.819,4.422 11.993,4.422 11.993,7.594 12.819,7.594 12.819,6.287 13.908,6.287 
                                            13.908,7.594 14.734,7.594 14.734,4.422 13.908,4.422         "/>
                                        <path d="M17.894,4.837c-0.134-0.15-0.297-0.269-0.491-0.354c-0.194-0.086-0.416-0.129-0.665-0.129s-0.47,0.043-0.664,0.129
                                            c-0.194,0.085-0.358,0.203-0.491,0.354c-0.133,0.149-0.235,0.324-0.305,0.524c-0.069,0.199-0.104,0.416-0.104,0.646
                                            c0,0.231,0.035,0.446,0.104,0.647c0.07,0.199,0.172,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.664,0.13c0.249,0,0.47-0.043,0.665-0.13c0.193-0.085,0.356-0.202,0.491-0.353
                                            c0.133-0.15,0.233-0.325,0.305-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C18.127,5.161,18.027,4.986,17.894,4.837z M17.437,6.355c-0.027,0.111-0.07,0.212-0.13,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.17-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.014-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.059-0.089,0.135-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.13,0.302c0.025,0.112,0.04,0.228,0.04,0.347C17.475,6.126,17.462,6.241,17.437,6.355z"/>
                                        <path d="M21.35,4.837c-0.133-0.15-0.297-0.269-0.49-0.354c-0.194-0.086-0.416-0.129-0.664-0.129c-0.249,0-0.471,0.043-0.665,0.129
                                            c-0.194,0.085-0.357,0.203-0.491,0.354c-0.134,0.149-0.235,0.324-0.305,0.524C18.666,5.56,18.63,5.777,18.63,6.007
                                            c0,0.231,0.035,0.446,0.104,0.647c0.069,0.199,0.171,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.665,0.13s0.47-0.043,0.664-0.13c0.193-0.085,0.357-0.202,0.49-0.353
                                            c0.134-0.15,0.234-0.325,0.306-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C21.584,5.161,21.484,4.986,21.35,4.837z M20.892,6.355c-0.025,0.111-0.068,0.212-0.129,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.169-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.013-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.061-0.089,0.136-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.129,0.302c0.026,0.113,0.04,0.228,0.04,0.347C20.932,6.126,20.919,6.241,20.892,6.355z"/>
                                        <polygon points="23.036,4.422 22.208,4.422 22.208,7.594 24.514,7.594 24.514,6.883 23.036,6.883      "/>
                                        <path d="M1.753,19.047c-0.185-1.673,0.617-2.686,0.925-3.007c0.285,1.731,1.78,3.063,3.593,3.063c1.716,0,3.151-1.196,3.541-2.795
                                            c0.295,0.521,0.794,1.59,0.672,2.738c3.046-0.025,1.545-3.505-0.588-3.885c-0.016-0.179-0.032-0.357-0.07-0.528
                                            c-0.125-1.099-1.11-3.335-3.933-3.269c-2.433,0.058-2.965,1.889-3.091,3.004c-0.086,0.275-0.142,0.563-0.159,0.861
                                            C-0.527,15.779-0.179,18.994,1.753,19.047z M4.56,14.418c0,0,0.312,0.107,0.312,1.124c0.538,0.187,1.473-1.581,1.473-1.581v1.391
                                            c0.596,0.162,2.467-0.05,2.467-0.05l0.069,0.057C8.883,15.39,8.89,15.421,8.89,15.45c0,1.442-1.175,2.62-2.62,2.62
                                            c-1.425,0-2.582-1.146-2.613-2.562C4.178,15.317,4.56,14.418,4.56,14.418z"/>
                                        <polygon points="10.482,24.275 11.942,23.914 8.451,19.195 7.03,19.195 5.494,19.195 4.206,19.195 0.62,23.518 1.258,24.843 
                                            4.07,21.621 4.232,22.898 1.619,27.393 4.633,27.393 4.633,31.301 4.237,31.301 4.237,31.759 6.041,31.759 6.041,31.301 
                                            6.041,31.301 6.041,27.393 6.717,27.393 6.717,31.301 6.717,31.759 8.518,31.759 8.518,31.301 8.123,31.301 8.123,27.393 
                                            10.461,27.393 8.156,22.898 8.281,21.326         "/>
                                        <path d="M24.054,11.363c-0.771,0-1.776,0.63-2.322,1.094c-0.681,0.574-0.145,1.081-0.145,2.041c0,1.736,1.402,3.137,3.136,3.137
                                            c1.732,0,3.137-1.4,3.137-3.137c0-1.081,0.379-2.072-0.455-2.637C26.905,11.527,24.706,11.363,24.054,11.363z M24.795,16.906
                                            c-1.268,0-2.294-1.045-2.294-2.335c0-0.132,0.019-0.256,0.038-0.381c0.576-0.106,0.968,0.087,0.968,0.087l0.962-0.472
                                            c0,0-0.488,0.71-0.048,0.472c0.979-0.33,2.074-0.193,2.632-0.084c0.021,0.124,0.039,0.246,0.039,0.378
                                            C27.091,15.861,26.065,16.906,24.795,16.906z"/>
                                        <polygon points="22.786,18.148 19.239,23.585 20.322,24.729 22.569,20.754 22.46,26.344 23.084,26.344 23.084,30.254 
                                            22.689,30.254 22.689,30.713 24.493,30.713 24.493,30.254 24.493,26.344 25.168,26.344 25.168,30.254 25.168,30.713 
                                            26.969,30.713 26.969,30.254 26.575,30.254 26.575,26.344 27.332,26.344 27.332,21.297 29.306,24.049 30.069,22.826 
                                            26.931,18.148       "/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                                <span class="school-title color2">
                                    ELEMENTARY
                                </span>
                            </div>
                            <div class="info">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-name">
                                        DAVID THOMPSON<br>SECONDARY SCHOOL
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-address">
                                        1755 E 55th Aven
                                    </div>
                                    <div class="school-grades">
                                        Grade:   8-12
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row item school2">
                            <div class="school-head icon bg-color2">
                                <svg version="1.1" id="Capa_1" class="fill2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 31.759 31.759" style="enable-background:new 0 0 31.759 31.759;"
                                     xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M16.658,10.067h9.986l4.836-3.979l-4.836-3.979h-9.986V0h-2.887v2.108H2.096v7.959h11.675v19.227h-2.91v2.024h8.627
                                            v-2.024h-2.83V10.067z M2.999,9.164V3.013h23.322l3.737,3.075l-3.737,3.076H2.999z"/>
                                        <path d="M7.953,5.975c-0.086-0.07-0.184-0.128-0.294-0.174C7.55,5.755,7.437,5.716,7.322,5.683
                                            C7.206,5.65,7.094,5.623,6.984,5.599c-0.11-0.023-0.208-0.05-0.295-0.08S6.531,5.455,6.48,5.417
                                            C6.428,5.378,6.402,5.328,6.402,5.266c0-0.053,0.013-0.097,0.038-0.131C6.465,5.1,6.497,5.072,6.535,5.053
                                            c0.039-0.021,0.082-0.036,0.129-0.046c0.047-0.008,0.093-0.012,0.138-0.012c0.062,0,0.124,0.006,0.187,0.02
                                            c0.062,0.013,0.117,0.034,0.167,0.064c0.048,0.03,0.088,0.068,0.118,0.118c0.03,0.049,0.042,0.108,0.04,0.18h0.825
                                            c0-0.178-0.037-0.332-0.111-0.46c-0.074-0.129-0.17-0.235-0.289-0.318C7.621,4.517,7.486,4.455,7.333,4.415
                                            C7.18,4.375,7.026,4.354,6.869,4.354c-0.148,0-0.3,0.019-0.454,0.054C6.261,4.443,6.122,4.501,5.998,4.576
                                            C5.873,4.654,5.772,4.753,5.693,4.877C5.614,5,5.575,5.146,5.575,5.318c0,0.146,0.027,0.27,0.083,0.373
                                            c0.055,0.101,0.125,0.187,0.213,0.257c0.087,0.07,0.186,0.126,0.298,0.171c0.11,0.044,0.222,0.083,0.335,0.116
                                            c0.116,0.032,0.227,0.06,0.335,0.086C6.947,6.345,7.044,6.375,7.13,6.407c0.086,0.032,0.155,0.071,0.207,0.116
                                            c0.052,0.044,0.078,0.102,0.078,0.174c0,0.059-0.015,0.109-0.044,0.15c-0.029,0.041-0.068,0.075-0.116,0.1
                                            C7.208,6.973,7.154,6.991,7.093,7.003C7.032,7.016,6.971,7.021,6.909,7.021c-0.178,0-0.32-0.036-0.427-0.107
                                            C6.376,6.843,6.318,6.715,6.309,6.527H5.482c0,0.205,0.037,0.378,0.113,0.52C5.671,7.191,5.772,7.307,5.9,7.399
                                            c0.127,0.092,0.273,0.159,0.438,0.2C6.503,7.641,6.676,7.662,6.86,7.662c0.175,0,0.345-0.018,0.511-0.054
                                            c0.166-0.035,0.313-0.094,0.442-0.176c0.129-0.08,0.233-0.19,0.311-0.326C8.202,6.969,8.242,6.8,8.242,6.6
                                            c0-0.144-0.027-0.266-0.081-0.367C8.109,6.129,8.039,6.044,7.953,5.975z"/>
                                        <path d="M9.526,5.359c0.06-0.089,0.136-0.16,0.229-0.214c0.093-0.053,0.207-0.079,0.34-0.079c0.175,0,0.319,0.041,0.434,0.123
                                            c0.114,0.084,0.183,0.205,0.207,0.365h0.827c-0.006-0.189-0.053-0.359-0.14-0.51c-0.087-0.148-0.199-0.274-0.335-0.377
                                            c-0.136-0.103-0.29-0.18-0.46-0.233c-0.17-0.054-0.341-0.08-0.512-0.08c-0.24,0-0.458,0.043-0.654,0.129
                                            C9.267,4.568,9.1,4.686,8.962,4.837C8.821,4.986,8.716,5.161,8.641,5.361C8.568,5.561,8.53,5.777,8.53,6.008
                                            c0,0.231,0.037,0.446,0.111,0.647c0.075,0.199,0.18,0.374,0.318,0.525c0.138,0.149,0.305,0.267,0.5,0.352
                                            c0.195,0.087,0.414,0.13,0.654,0.13c0.201,0,0.387-0.028,0.56-0.088c0.171-0.057,0.321-0.142,0.448-0.252
                                            c0.128-0.112,0.23-0.248,0.307-0.409s0.121-0.345,0.133-0.549h-0.827c-0.015,0.184-0.076,0.328-0.184,0.431
                                            c-0.108,0.104-0.26,0.156-0.456,0.156c-0.133,0-0.247-0.027-0.34-0.08C9.661,6.818,9.585,6.745,9.526,6.656
                                            C9.467,6.567,9.424,6.467,9.397,6.355c-0.027-0.114-0.04-0.229-0.04-0.348c0-0.119,0.013-0.234,0.04-0.347
                                            C9.424,5.549,9.466,5.448,9.526,5.359z"/>
                                        <polygon points="13.908,5.577 12.819,5.577 12.819,4.422 11.993,4.422 11.993,7.594 12.819,7.594 12.819,6.287 13.908,6.287 
                                            13.908,7.594 14.734,7.594 14.734,4.422 13.908,4.422         "/>
                                        <path d="M17.894,4.837c-0.134-0.15-0.297-0.269-0.491-0.354c-0.194-0.086-0.416-0.129-0.665-0.129s-0.47,0.043-0.664,0.129
                                            c-0.194,0.085-0.358,0.203-0.491,0.354c-0.133,0.149-0.235,0.324-0.305,0.524c-0.069,0.199-0.104,0.416-0.104,0.646
                                            c0,0.231,0.035,0.446,0.104,0.647c0.07,0.199,0.172,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.664,0.13c0.249,0,0.47-0.043,0.665-0.13c0.193-0.085,0.356-0.202,0.491-0.353
                                            c0.133-0.15,0.233-0.325,0.305-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C18.127,5.161,18.027,4.986,17.894,4.837z M17.437,6.355c-0.027,0.111-0.07,0.212-0.13,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.17-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.014-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.059-0.089,0.135-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.13,0.302c0.025,0.112,0.04,0.228,0.04,0.347C17.475,6.126,17.462,6.241,17.437,6.355z"/>
                                        <path d="M21.35,4.837c-0.133-0.15-0.297-0.269-0.49-0.354c-0.194-0.086-0.416-0.129-0.664-0.129c-0.249,0-0.471,0.043-0.665,0.129
                                            c-0.194,0.085-0.357,0.203-0.491,0.354c-0.134,0.149-0.235,0.324-0.305,0.524C18.666,5.56,18.63,5.777,18.63,6.007
                                            c0,0.231,0.035,0.446,0.104,0.647c0.069,0.199,0.171,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.665,0.13s0.47-0.043,0.664-0.13c0.193-0.085,0.357-0.202,0.49-0.353
                                            c0.134-0.15,0.234-0.325,0.306-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C21.584,5.161,21.484,4.986,21.35,4.837z M20.892,6.355c-0.025,0.111-0.068,0.212-0.129,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.169-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.013-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.061-0.089,0.136-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.129,0.302c0.026,0.113,0.04,0.228,0.04,0.347C20.932,6.126,20.919,6.241,20.892,6.355z"/>
                                        <polygon points="23.036,4.422 22.208,4.422 22.208,7.594 24.514,7.594 24.514,6.883 23.036,6.883      "/>
                                        <path d="M1.753,19.047c-0.185-1.673,0.617-2.686,0.925-3.007c0.285,1.731,1.78,3.063,3.593,3.063c1.716,0,3.151-1.196,3.541-2.795
                                            c0.295,0.521,0.794,1.59,0.672,2.738c3.046-0.025,1.545-3.505-0.588-3.885c-0.016-0.179-0.032-0.357-0.07-0.528
                                            c-0.125-1.099-1.11-3.335-3.933-3.269c-2.433,0.058-2.965,1.889-3.091,3.004c-0.086,0.275-0.142,0.563-0.159,0.861
                                            C-0.527,15.779-0.179,18.994,1.753,19.047z M4.56,14.418c0,0,0.312,0.107,0.312,1.124c0.538,0.187,1.473-1.581,1.473-1.581v1.391
                                            c0.596,0.162,2.467-0.05,2.467-0.05l0.069,0.057C8.883,15.39,8.89,15.421,8.89,15.45c0,1.442-1.175,2.62-2.62,2.62
                                            c-1.425,0-2.582-1.146-2.613-2.562C4.178,15.317,4.56,14.418,4.56,14.418z"/>
                                        <polygon points="10.482,24.275 11.942,23.914 8.451,19.195 7.03,19.195 5.494,19.195 4.206,19.195 0.62,23.518 1.258,24.843 
                                            4.07,21.621 4.232,22.898 1.619,27.393 4.633,27.393 4.633,31.301 4.237,31.301 4.237,31.759 6.041,31.759 6.041,31.301 
                                            6.041,31.301 6.041,27.393 6.717,27.393 6.717,31.301 6.717,31.759 8.518,31.759 8.518,31.301 8.123,31.301 8.123,27.393 
                                            10.461,27.393 8.156,22.898 8.281,21.326         "/>
                                        <path d="M24.054,11.363c-0.771,0-1.776,0.63-2.322,1.094c-0.681,0.574-0.145,1.081-0.145,2.041c0,1.736,1.402,3.137,3.136,3.137
                                            c1.732,0,3.137-1.4,3.137-3.137c0-1.081,0.379-2.072-0.455-2.637C26.905,11.527,24.706,11.363,24.054,11.363z M24.795,16.906
                                            c-1.268,0-2.294-1.045-2.294-2.335c0-0.132,0.019-0.256,0.038-0.381c0.576-0.106,0.968,0.087,0.968,0.087l0.962-0.472
                                            c0,0-0.488,0.71-0.048,0.472c0.979-0.33,2.074-0.193,2.632-0.084c0.021,0.124,0.039,0.246,0.039,0.378
                                            C27.091,15.861,26.065,16.906,24.795,16.906z"/>
                                        <polygon points="22.786,18.148 19.239,23.585 20.322,24.729 22.569,20.754 22.46,26.344 23.084,26.344 23.084,30.254 
                                            22.689,30.254 22.689,30.713 24.493,30.713 24.493,30.254 24.493,26.344 25.168,26.344 25.168,30.254 25.168,30.713 
                                            26.969,30.713 26.969,30.254 26.575,30.254 26.575,26.344 27.332,26.344 27.332,21.297 29.306,24.049 30.069,22.826 
                                            26.931,18.148       "/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                                <span class="school-title color2">
                                    ELEMENTARY
                                </span>
                            </div>
                            <div class="info">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-name">
                                        DAVID THOMPSON<br>SECONDARY SCHOOL
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-address">
                                        1755 E 55th Aven
                                    </div>
                                    <div class="school-grades">
                                        Grade:   8-12
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="row item school2">
                            <div class="school-head icon bg-color2">
                                <svg version="1.1" id="Capa_1" class="fill2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 31.759 31.759" style="enable-background:new 0 0 31.759 31.759;"
                                     xml:space="preserve">
                                <g>
                                    <g>
                                        <path d="M16.658,10.067h9.986l4.836-3.979l-4.836-3.979h-9.986V0h-2.887v2.108H2.096v7.959h11.675v19.227h-2.91v2.024h8.627
                                            v-2.024h-2.83V10.067z M2.999,9.164V3.013h23.322l3.737,3.075l-3.737,3.076H2.999z"/>
                                        <path d="M7.953,5.975c-0.086-0.07-0.184-0.128-0.294-0.174C7.55,5.755,7.437,5.716,7.322,5.683
                                            C7.206,5.65,7.094,5.623,6.984,5.599c-0.11-0.023-0.208-0.05-0.295-0.08S6.531,5.455,6.48,5.417
                                            C6.428,5.378,6.402,5.328,6.402,5.266c0-0.053,0.013-0.097,0.038-0.131C6.465,5.1,6.497,5.072,6.535,5.053
                                            c0.039-0.021,0.082-0.036,0.129-0.046c0.047-0.008,0.093-0.012,0.138-0.012c0.062,0,0.124,0.006,0.187,0.02
                                            c0.062,0.013,0.117,0.034,0.167,0.064c0.048,0.03,0.088,0.068,0.118,0.118c0.03,0.049,0.042,0.108,0.04,0.18h0.825
                                            c0-0.178-0.037-0.332-0.111-0.46c-0.074-0.129-0.17-0.235-0.289-0.318C7.621,4.517,7.486,4.455,7.333,4.415
                                            C7.18,4.375,7.026,4.354,6.869,4.354c-0.148,0-0.3,0.019-0.454,0.054C6.261,4.443,6.122,4.501,5.998,4.576
                                            C5.873,4.654,5.772,4.753,5.693,4.877C5.614,5,5.575,5.146,5.575,5.318c0,0.146,0.027,0.27,0.083,0.373
                                            c0.055,0.101,0.125,0.187,0.213,0.257c0.087,0.07,0.186,0.126,0.298,0.171c0.11,0.044,0.222,0.083,0.335,0.116
                                            c0.116,0.032,0.227,0.06,0.335,0.086C6.947,6.345,7.044,6.375,7.13,6.407c0.086,0.032,0.155,0.071,0.207,0.116
                                            c0.052,0.044,0.078,0.102,0.078,0.174c0,0.059-0.015,0.109-0.044,0.15c-0.029,0.041-0.068,0.075-0.116,0.1
                                            C7.208,6.973,7.154,6.991,7.093,7.003C7.032,7.016,6.971,7.021,6.909,7.021c-0.178,0-0.32-0.036-0.427-0.107
                                            C6.376,6.843,6.318,6.715,6.309,6.527H5.482c0,0.205,0.037,0.378,0.113,0.52C5.671,7.191,5.772,7.307,5.9,7.399
                                            c0.127,0.092,0.273,0.159,0.438,0.2C6.503,7.641,6.676,7.662,6.86,7.662c0.175,0,0.345-0.018,0.511-0.054
                                            c0.166-0.035,0.313-0.094,0.442-0.176c0.129-0.08,0.233-0.19,0.311-0.326C8.202,6.969,8.242,6.8,8.242,6.6
                                            c0-0.144-0.027-0.266-0.081-0.367C8.109,6.129,8.039,6.044,7.953,5.975z"/>
                                        <path d="M9.526,5.359c0.06-0.089,0.136-0.16,0.229-0.214c0.093-0.053,0.207-0.079,0.34-0.079c0.175,0,0.319,0.041,0.434,0.123
                                            c0.114,0.084,0.183,0.205,0.207,0.365h0.827c-0.006-0.189-0.053-0.359-0.14-0.51c-0.087-0.148-0.199-0.274-0.335-0.377
                                            c-0.136-0.103-0.29-0.18-0.46-0.233c-0.17-0.054-0.341-0.08-0.512-0.08c-0.24,0-0.458,0.043-0.654,0.129
                                            C9.267,4.568,9.1,4.686,8.962,4.837C8.821,4.986,8.716,5.161,8.641,5.361C8.568,5.561,8.53,5.777,8.53,6.008
                                            c0,0.231,0.037,0.446,0.111,0.647c0.075,0.199,0.18,0.374,0.318,0.525c0.138,0.149,0.305,0.267,0.5,0.352
                                            c0.195,0.087,0.414,0.13,0.654,0.13c0.201,0,0.387-0.028,0.56-0.088c0.171-0.057,0.321-0.142,0.448-0.252
                                            c0.128-0.112,0.23-0.248,0.307-0.409s0.121-0.345,0.133-0.549h-0.827c-0.015,0.184-0.076,0.328-0.184,0.431
                                            c-0.108,0.104-0.26,0.156-0.456,0.156c-0.133,0-0.247-0.027-0.34-0.08C9.661,6.818,9.585,6.745,9.526,6.656
                                            C9.467,6.567,9.424,6.467,9.397,6.355c-0.027-0.114-0.04-0.229-0.04-0.348c0-0.119,0.013-0.234,0.04-0.347
                                            C9.424,5.549,9.466,5.448,9.526,5.359z"/>
                                        <polygon points="13.908,5.577 12.819,5.577 12.819,4.422 11.993,4.422 11.993,7.594 12.819,7.594 12.819,6.287 13.908,6.287 
                                            13.908,7.594 14.734,7.594 14.734,4.422 13.908,4.422         "/>
                                        <path d="M17.894,4.837c-0.134-0.15-0.297-0.269-0.491-0.354c-0.194-0.086-0.416-0.129-0.665-0.129s-0.47,0.043-0.664,0.129
                                            c-0.194,0.085-0.358,0.203-0.491,0.354c-0.133,0.149-0.235,0.324-0.305,0.524c-0.069,0.199-0.104,0.416-0.104,0.646
                                            c0,0.231,0.035,0.446,0.104,0.647c0.07,0.199,0.172,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.664,0.13c0.249,0,0.47-0.043,0.665-0.13c0.193-0.085,0.356-0.202,0.491-0.353
                                            c0.133-0.15,0.233-0.325,0.305-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C18.127,5.161,18.027,4.986,17.894,4.837z M17.437,6.355c-0.027,0.111-0.07,0.212-0.13,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.17-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.014-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.059-0.089,0.135-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.13,0.302c0.025,0.112,0.04,0.228,0.04,0.347C17.475,6.126,17.462,6.241,17.437,6.355z"/>
                                        <path d="M21.35,4.837c-0.133-0.15-0.297-0.269-0.49-0.354c-0.194-0.086-0.416-0.129-0.664-0.129c-0.249,0-0.471,0.043-0.665,0.129
                                            c-0.194,0.085-0.357,0.203-0.491,0.354c-0.134,0.149-0.235,0.324-0.305,0.524C18.666,5.56,18.63,5.777,18.63,6.007
                                            c0,0.231,0.035,0.446,0.104,0.647c0.069,0.199,0.171,0.374,0.305,0.524c0.133,0.149,0.297,0.267,0.491,0.353
                                            c0.194,0.087,0.416,0.13,0.665,0.13s0.47-0.043,0.664-0.13c0.193-0.085,0.357-0.202,0.49-0.353
                                            c0.134-0.15,0.234-0.325,0.306-0.524c0.068-0.201,0.104-0.416,0.104-0.647c0-0.23-0.035-0.447-0.104-0.646
                                            C21.584,5.161,21.484,4.986,21.35,4.837z M20.892,6.355c-0.025,0.111-0.068,0.212-0.129,0.301
                                            c-0.059,0.089-0.136,0.161-0.229,0.214c-0.094,0.053-0.207,0.08-0.34,0.08s-0.247-0.027-0.34-0.08
                                            c-0.094-0.053-0.169-0.125-0.229-0.214c-0.059-0.089-0.102-0.189-0.129-0.301c-0.026-0.114-0.04-0.229-0.04-0.348
                                            c0-0.119,0.013-0.234,0.04-0.347c0.027-0.112,0.07-0.213,0.129-0.302c0.061-0.089,0.136-0.16,0.229-0.214
                                            c0.093-0.053,0.207-0.079,0.34-0.079s0.247,0.026,0.34,0.079c0.093,0.054,0.169,0.125,0.229,0.214
                                            c0.061,0.089,0.104,0.189,0.129,0.302c0.026,0.113,0.04,0.228,0.04,0.347C20.932,6.126,20.919,6.241,20.892,6.355z"/>
                                        <polygon points="23.036,4.422 22.208,4.422 22.208,7.594 24.514,7.594 24.514,6.883 23.036,6.883      "/>
                                        <path d="M1.753,19.047c-0.185-1.673,0.617-2.686,0.925-3.007c0.285,1.731,1.78,3.063,3.593,3.063c1.716,0,3.151-1.196,3.541-2.795
                                            c0.295,0.521,0.794,1.59,0.672,2.738c3.046-0.025,1.545-3.505-0.588-3.885c-0.016-0.179-0.032-0.357-0.07-0.528
                                            c-0.125-1.099-1.11-3.335-3.933-3.269c-2.433,0.058-2.965,1.889-3.091,3.004c-0.086,0.275-0.142,0.563-0.159,0.861
                                            C-0.527,15.779-0.179,18.994,1.753,19.047z M4.56,14.418c0,0,0.312,0.107,0.312,1.124c0.538,0.187,1.473-1.581,1.473-1.581v1.391
                                            c0.596,0.162,2.467-0.05,2.467-0.05l0.069,0.057C8.883,15.39,8.89,15.421,8.89,15.45c0,1.442-1.175,2.62-2.62,2.62
                                            c-1.425,0-2.582-1.146-2.613-2.562C4.178,15.317,4.56,14.418,4.56,14.418z"/>
                                        <polygon points="10.482,24.275 11.942,23.914 8.451,19.195 7.03,19.195 5.494,19.195 4.206,19.195 0.62,23.518 1.258,24.843 
                                            4.07,21.621 4.232,22.898 1.619,27.393 4.633,27.393 4.633,31.301 4.237,31.301 4.237,31.759 6.041,31.759 6.041,31.301 
                                            6.041,31.301 6.041,27.393 6.717,27.393 6.717,31.301 6.717,31.759 8.518,31.759 8.518,31.301 8.123,31.301 8.123,27.393 
                                            10.461,27.393 8.156,22.898 8.281,21.326         "/>
                                        <path d="M24.054,11.363c-0.771,0-1.776,0.63-2.322,1.094c-0.681,0.574-0.145,1.081-0.145,2.041c0,1.736,1.402,3.137,3.136,3.137
                                            c1.732,0,3.137-1.4,3.137-3.137c0-1.081,0.379-2.072-0.455-2.637C26.905,11.527,24.706,11.363,24.054,11.363z M24.795,16.906
                                            c-1.268,0-2.294-1.045-2.294-2.335c0-0.132,0.019-0.256,0.038-0.381c0.576-0.106,0.968,0.087,0.968,0.087l0.962-0.472
                                            c0,0-0.488,0.71-0.048,0.472c0.979-0.33,2.074-0.193,2.632-0.084c0.021,0.124,0.039,0.246,0.039,0.378
                                            C27.091,15.861,26.065,16.906,24.795,16.906z"/>
                                        <polygon points="22.786,18.148 19.239,23.585 20.322,24.729 22.569,20.754 22.46,26.344 23.084,26.344 23.084,30.254 
                                            22.689,30.254 22.689,30.713 24.493,30.713 24.493,30.254 24.493,26.344 25.168,26.344 25.168,30.254 25.168,30.713 
                                            26.969,30.713 26.969,30.254 26.575,30.254 26.575,26.344 27.332,26.344 27.332,21.297 29.306,24.049 30.069,22.826 
                                            26.931,18.148       "/>
                                    </g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                <g>
                                </g>
                                </svg>
                                <span class="school-title color2">
                                    ELEMENTARY
                                </span>
                            </div>
                            <div class="info">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-name">
                                        DAVID THOMPSON<br>SECONDARY SCHOOL
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="school-address">
                                        1755 E 55th Aven
                                    </div>
                                    <div class="school-grades">
                                        Grade:   8-12
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="transport section" id="transport">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    TRANSPORTATION
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 school-item-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row item">
                            <div class="transport-head icon bg-color2">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                    <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                    <g><g><circle cx="277.5" cy="748.8" r="49"/><circle cx="722.5" cy="748.8" r="49"/><path d="M370.5,217.5h242.9c23.9,0,43.2-19.4,43.2-43.2S637.3,131,613.4,131H370.5c-23.9,0-43.2,19.4-43.2,43.2S346.6,217.5,370.5,217.5z"/><path d="M919.4,220.3c-1.4,0-2.9,0.1-4.3,0.2v-29.5C915.1,91.2,833.9,10,734,10H266C166.1,10,84.9,91.2,84.9,191.1v29.5c-1.4-0.1-2.8-0.2-4.3-0.2c-23.9,0-43.2,19.4-43.2,43.2v216.2c0,23.9,19.4,43.2,43.2,43.2c1.4,0,2.9-0.1,4.3-0.2v345.3c0,23.9,19.4,43.2,43.2,43.2h80.1v35.4c0,23.9,19.4,43.2,43.2,43.2h52.4c23.9,0,43.2-19.4,43.2-43.2v-35.4h305.8v35.4c0,23.9,19.4,43.2,43.2,43.2h52.4c23.9,0,43.2-19.4,43.2-43.2v-35.4h80.1c23.9,0,43.2-19.4,43.2-43.2V522.8c1.4,0.1,2.8,0.2,4.3,0.2c23.9,0,43.2-19.4,43.2-43.2V263.6C962.7,239.7,943.3,220.3,919.4,220.3z M171.3,346.3h657.3v240.5H171.3V346.3z M266,96.5H734c52.2,0,94.6,42.4,94.6,94.6v68.7H171.3v-68.7C171.3,138.9,213.8,96.5,266,96.5z M171.3,824.9V673.2h657.3v151.7H171.3z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                                    </svg>
                                <span class="transport-title color2">
                                    BUS STOP
                                </span>
                            </div>
                            <div class="info">
                                <div class="transport-name">
                                    Churchill Retirement Community
                                </div>
                                <div class="transport-address">
                                    10015 103 Avenue NW
                                </div>
                                <div class="transport-distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row item train-item">
                            <div class="transport-head icon bg-color2">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                    <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                    <g><g><g><path d="M243.9,990l141.8-206.3h228.5L756.1,990h76.8L690,782.1c48.3-8.3,85.1-50.2,85.1-100.9v-500c0-56.6-45.9-102.5-102.5-102.5H586V44.4c0-19-15.4-34.4-34.4-34.4s-34.4,15.4-34.4,34.4v34.4h-51.6V44.4c0-19-15.4-34.4-34.4-34.4s-34.4,15.4-34.4,34.4v34.4h-86.7c-56.6,0-102.5,45.9-102.5,102.5v500c0,56.2,45.2,101.7,101.2,102.4L167.1,990H243.9z M632.2,694.2c-29.5,0-53.3-23.9-53.3-53.3s23.9-53.3,53.3-53.3c29.5,0,53.3,23.9,53.3,53.3S661.6,694.2,632.2,694.2z M345.3,491.4h292.3c9.5,0,17.2,7.7,17.2,17.2c0,9.5-7.7,17.2-17.2,17.2H345.3c-9.5,0-17.2-7.7-17.2-17.2C328.1,499.1,335.8,491.4,345.3,491.4z M328.1,457c0-9.5,7.7-17.2,17.2-17.2h292.3c9.5,0,17.2,7.7,17.2,17.2s-7.7,17.2-17.2,17.2H345.3C335.8,474.2,328.1,466.5,328.1,457z M276.5,198.8c0-28.3,22.9-51.2,51.2-51.2h103.5h120.4h103.5c28.3,0,51.2,22.9,51.2,51.2v121.1c0,28.3-22.9,51.2-51.2,51.2H327.7c-28.3,0-51.2-22.9-51.2-51.2L276.5,198.8L276.5,198.8z M284.5,640.9c0-29.5,23.9-53.3,53.3-53.3c29.5,0,53.3,23.9,53.3,53.3s-23.9,53.3-53.3,53.3C308.4,694.2,284.5,670.3,284.5,640.9z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                                    </svg>
                                <span class="transport-title color2">
                                    LRT
                                </span>
                            </div>
                            <div class="info">
                                <div class="transport-name">
                                     Churchill
                                </div>
                                <div class="transport-address">
                                    99 Street & 102A Avenue
                                </div>
                                <div class="transport-distance color1"><strong class="color1">Distance</strong>: 0.13km</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="library section" id="library">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    PUBLIC LIBRARY
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7 school-item-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-2">
                                <div class="row">
                                    <div class="icon bg-color2">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill2">
                                        <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                        <g><g transform="translate(0.000000,511.000000) scale(0.100000,-0.100000)"><path d="M333.8,4801c-37.9-11.1-91.3-42.3-120.3-69C120,4645.1,100,4556,100,4244.2v-289.5h1002.1h1002.2v289.5c0,343-28.9,440.9-153.7,516.7c-77.9,51.2-93.5,51.2-815.1,55.7C732.5,4818.8,369.5,4812.1,333.8,4801z"/><path d="M2839.2,4201.9c-138.1-73.5-167-151.4-173.7-496.6l-8.9-307.3h714.9h714.9v314c0,278.4-4.5,325.1-44.5,387.5c-82.4,131.4-140.3,144.8-661.4,144.8C2970.6,4244.2,2908.3,4239.8,2839.2,4201.9z"/><path d="M7177.4,3687.5c-376.3-84.6-706-167-732.7-187.1c-77.9-53.4-131.4-151.4-131.4-238.3c0-102.4,46.8-331.8,66.8-331.8c31.2,0,1917.4,418.7,1926.4,427.6c4.5,4.4-6.7,77.9-26.7,160.3c-24.5,111.3-53.4,173.7-104.7,231.6C8059.3,3874.5,7981.4,3870.1,7177.4,3687.5z"/><path d="M100-31.6v-3140.1h1002.1h1002.2V-31.6v3140.1H1102.1H100V-31.6z"/><path d="M2665.5-169.7l6.7-2990.9l708.2-6.7l706-4.5v2995.3v2995.3h-712.6H2661L2665.5-169.7z"/><path d="M7449.1,2580.6c-521.1-115.8-948.7-213.8-950.9-216c-8.9-8.9,1267.2-5814.7,1282.8-5828.1c6.7-6.7,447.6,82.4,977.6,200.4c792.8,173.7,964.3,218.2,955.4,247.2c-4.5,17.8-291.7,1334-641.4,2921.8c-347.4,1590.1-641.4,2888.4-654.7,2888.4C8406.7,2792.2,7970.2,2696.4,7449.1,2580.6z"/><path d="M4865.8,2513.8c-17.8-6.7-57.9-33.4-84.6-60.1c-102.4-91.3-115.8-149.2-115.8-469.9v-300.6h857.4h857.4v318.5c0,347.4-15.6,398.6-147,485.5c-60.1,37.9-113.6,42.3-699.3,40.1C5184.2,2527.2,4883.6,2520.5,4865.8,2513.8z"/><path d="M4665.4-1033.8v-2137.9h857.4h857.4v2137.9v2137.9h-857.4h-857.4V-1033.8z"/><path d="M8836.5-3826.4c-503.3-111.3-922-207.1-926.4-213.8c-17.8-17.8,51.2-296.2,86.8-351.9c46.8-71.3,162.6-138.1,238.3-138.1c73.5,0,1376.3,280.6,1469.8,316.2c33.4,13.3,91.3,57.9,126.9,100.2c75.7,84.6,86.9,187.1,40.1,383c-20,93.5-33.4,113.6-71.3,111.3C9774.1-3621.6,9342.1-3712.9,8836.5-3826.4z"/><path d="M115.6-3744c-8.9-6.7-15.6-140.3-15.6-294c0-354.1,35.6-447.6,189.3-516.7c95.8-42.3,140.3-44.5,852.9-37.9c734.9,6.7,752.7,6.7,819.5,55.7c120.3,86.8,142.5,164.8,142.5,505.5v302.9h-986.6C574.3-3728.4,122.3-3735.1,115.6-3744z"/><path d="M2670-3761.9c-6.7-17.8-8.9-160.4-4.4-316.2c13.4-485.5,57.9-518.9,714.9-518.9c487.7,0,543.4,11.1,645.8,131.4c60.1,71.2,60.1,75.7,60.1,405.3v331.8h-701.5C2783.5-3728.4,2681.1-3732.9,2670-3761.9z"/><path d="M4669.8-4060.3c6.7-296.2,11.1-340.7,53.4-396.4c98-133.6,138.1-140.3,795-140.3c645.8,0,688.2,6.7,795,120.3c53.5,60.1,55.7,73.5,62.3,405.3l6.7,343h-859.6h-859.6L4669.8-4060.3z"/></g></g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row bg-color1 color2 heading1">
                                            DISTRICT<br>BRANCH
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="row bg-color1 color2 heading2">
                                            FRESHVIEW BRANCH
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="row">
                            <div class="library-address">
                                1950 Argyle Dr<br>
                                (54th Avenue and Victoria Drive)
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="highlights section" id="highlights">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    HIGHLIGHTS
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color1 item">
                                        <div class="icon color2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve" class="fill2"> <g> <g> <path d="M496.946,272.105H481.19C474.326,168.747,397.543,83.974,297.7,65.629c2.683-5.759,4.289-13.877,4.289-20.639    c0-24.808-20.182-44.99-44.99-44.99s-44.99,20.182-44.99,44.99c0,6.762,1.606,14.88,4.289,20.639    C116.455,83.974,37.672,168.746,30.81,272.105H15.053c-8.289,0-14.997,6.308-14.997,14.597s6.707,14.997,14.997,14.997h481.893    c8.289,0,14.997-6.708,14.997-14.997S505.235,272.105,496.946,272.105z M256.999,61.752c-8.274,0-14.997-8.487-14.997-16.762    s6.723-14.997,14.997-14.997c8.274,0,14.997,6.722,14.997,14.997S265.274,61.752,256.999,61.752z"></path> </g> </g> <g> <g> <path d="M45.047,361.685c-8.399,0-14.997,6.598-14.997,14.997v120.207c0,8.397,6.598,14.997,14.997,14.997h44.99V361.685H45.047z"></path> </g> </g> <g> <g> <path d="M465.194,348.846c-11.716-11.716-30.695-11.716-42.411-0.001l-85.879,85.479c-10.759,10.759-24.916,16.741-40.027,17.34    h-41.076c-8.225,0-14.997-6.12-14.997-14.997c0-8.879,6.771-14.997,14.997-14.997c18.946,0,15.436,0,46.189,0    c16.496,0,29.993-13.497,29.993-29.993s-13.497-29.593-29.993-29.593h-29.993c-5.263,0-9.232,0.188-13.497-3.599    c-5.318-4.655-11.096-10.461-16.496-13.897c-29.977-21.16-73.326-26.297-109.477-7.408c-7.681,4.013-12.496,11.972-12.496,20.639    v154.067c190.757,0.256,173.303-0.002,174.446,0c32.044,0,62.183-12.477,84.839-35.148l85.879-85.879    C476.911,379.143,476.911,360.563,465.194,348.846z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color2">
                                                Restaurants
                                            </span>
                                        </div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color2 item">
                                        <div class="icon color1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 47.001 47.001" style="enable-background:new 0 0 47.001 47.001;" xml:space="preserve" class="fill1"> <g> <g id="Layer_1_78_"> <g> <path d="M44.845,42.718H2.136C0.956,42.718,0,43.674,0,44.855c0,1.179,0.956,2.135,2.136,2.135h42.708     c1.18,0,2.136-0.956,2.136-2.135C46.979,43.674,46.023,42.718,44.845,42.718z"></path> <path d="M4.805,37.165c-1.18,0-2.136,0.956-2.136,2.136s0.956,2.137,2.136,2.137h37.37c1.18,0,2.136-0.957,2.136-2.137     s-0.956-2.136-2.136-2.136h-0.533V17.945h0.533c0.591,0,1.067-0.478,1.067-1.067s-0.478-1.067-1.067-1.067H4.805     c-0.59,0-1.067,0.478-1.067,1.067s0.478,1.067,1.067,1.067h0.534v19.219H4.805z M37.37,17.945v19.219h-6.406V17.945H37.37z      M26.692,17.945v19.219h-6.406V17.945H26.692z M9.609,17.945h6.406v19.219H9.609V17.945z"></path> <path d="M2.136,13.891h42.708c0.007,0,0.015,0,0.021,0c1.181,0,2.136-0.956,2.136-2.136c0-0.938-0.604-1.733-1.443-2.021     l-21.19-9.535c-0.557-0.25-1.194-0.25-1.752,0L1.26,9.808c-0.919,0.414-1.424,1.412-1.212,2.396     C0.259,13.188,1.129,13.891,2.136,13.891z"></path> </g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color1">
                                                Banks
                                            </span>
                                        </div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color1 item">
                                        <div class="icon color2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 19.955 19.955" style="enable-background:new 0 0 19.955 19.955;" xml:space="preserve" class="fill2" > <g> <path d="M18.435,9.003c0.229,0.012,1.288,0.024,1.52,0.039l-1.793-6.162H18.13   c0.308-0.134,0.52-0.396,0.52-0.702V1.713c0-0.44-0.437-0.798-0.975-0.798H2.249c-0.538,0-0.974,0.357-0.974,0.798v0.465   c0,0.306,0.211,0.567,0.519,0.702H1.762L0,9.161c0.01-0.002,1.06-0.036,1.487-0.085v8.569H0.738v1.396h18.416v-1.396h-0.718   L18.435,9.003L18.435,9.003z M13.212,3.678l0.332,4.716c-0.84-0.024-1.631-0.04-2.383-0.05L11.06,3.678   c0-0.306,0.212-0.568,0.52-0.702h1.112C13.001,3.11,13.212,3.373,13.212,3.678z M9.149,3.678l-0.1,4.654   C8.183,8.335,7.391,8.347,6.667,8.365l0.33-4.687c0-0.306,0.212-0.568,0.52-0.702h1.114C8.938,3.11,9.149,3.373,9.149,3.678z    M2.979,3.678c0-0.305,0.212-0.568,0.52-0.702h1.113C4.919,3.11,5.131,3.373,5.131,3.678L4.593,8.439   c-1.009,0.049-1.807,0.109-2.41,0.164L2.979,3.678z M11.404,14.002H3.121v-3.84h8.283V14.002z M16.72,16.783h-3.217v-6.621h3.217   V16.783z M15.619,8.466l-0.54-4.788c0-0.306,0.212-0.568,0.519-0.702h1.114c0.306,0.134,0.518,0.397,0.518,0.702l0.793,4.901   C17.188,8.535,16.387,8.498,15.619,8.466z"></path> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color2">
                                                Convenience Stores
                                            </span>
                                        </div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color2 item">
                                        <div class="icon color1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 384 384" style="enable-background:new 0 0 384 384;" xml:space="preserve" class="fill1"> <g> <g> <path d="M352.427,90.24l0.32-0.32L273.28,10.667L250.667,33.28l45.013,45.013c-20.053,7.68-34.347,26.987-34.347,49.707    c0,29.44,23.893,53.333,53.333,53.333c7.573,0,14.827-1.6,21.333-4.48v153.813C336,342.4,326.4,352,314.667,352    c-11.733,0-21.333-9.6-21.333-21.333v-96c0-23.573-19.093-42.667-42.667-42.667h-21.333V42.667C229.333,19.093,210.24,0,186.667,0    h-128C35.093,0,16,19.093,16,42.667V384h213.333V224h32v106.667c0,29.44,23.893,53.333,53.333,53.333    c29.44,0,53.333-23.893,53.333-53.333V128C368,113.28,362.027,99.947,352.427,90.24z M186.667,149.333h-128V42.667h128V149.333z     M314.667,149.333c-11.733,0-21.333-9.6-21.333-21.333s9.6-21.333,21.333-21.333c11.733,0,21.333,9.6,21.333,21.333    S326.4,149.333,314.667,149.333z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color1">
                                                Gas Station
                                            </span>
                                        </div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color1 item">
                                        <div class="icon color2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve" class="fill2"> <g> <g> <path d="M423.892,229.581h-21.406v-43.154H49.378v82.953c0,97.352,79.202,176.554,176.554,176.554    c62.029,0,116.683-32.159,148.182-80.675h49.777c37.406,0,67.839-30.433,67.839-67.839    C491.731,260.015,461.298,229.581,423.892,229.581z M423.892,331.867h-32.839c7.379-19.436,11.433-40.496,11.433-62.487v-6.408    h21.406c18.994,0,34.448,15.453,34.448,34.448S442.886,331.867,423.892,331.867z"></path> </g> </g> <g> <g> <rect x="20.27" y="478.61" width="411.325" height="33.391"></rect> </g> </g> <g> <g> <path d="M297.392,86.894c0-6.167,1.312-8.316,4.187-13.023c3.832-6.275,9.081-14.869,9.081-30.427    c0-15.557-5.249-24.15-9.082-30.425c-2.875-4.706-4.186-6.854-4.186-13.019h-33.391c0,15.557,5.249,24.151,9.082,30.425    c2.875,4.706,4.186,6.853,4.186,13.018c0,6.167-1.312,8.316-4.187,13.023c-3.832,6.278-9.081,14.871-9.081,30.43    c0,15.558,5.249,24.152,9.081,30.426c2.875,4.707,4.187,6.855,4.187,13.023h33.391c0-15.558-5.249-24.152-9.081-30.427    C298.705,95.21,297.392,93.062,297.392,86.894z"></path> </g> </g> <g> <g> <path d="M174.595,86.894c0-6.167,1.312-8.316,4.187-13.023c3.832-6.275,9.081-14.869,9.081-30.427    c0-15.557-5.249-24.15-9.082-30.425c-2.875-4.706-4.186-6.854-4.186-13.019h-33.391c0,15.557,5.249,24.151,9.082,30.425    c2.875,4.706,4.186,6.853,4.186,13.018c0,6.167-1.312,8.316-4.187,13.023c-3.832,6.278-9.081,14.871-9.081,30.43    c0,15.558,5.249,24.152,9.081,30.426c2.875,4.707,4.187,6.855,4.187,13.023h33.391c0-15.558-5.249-24.152-9.081-30.427    C175.907,95.21,174.595,93.062,174.595,86.894z"></path> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color2">
                                                Cafe
                                            </span>
                                        </div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color2">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color2">10235 101 Street, Edmonton</div>
                                        <div class="distance color2"><strong class="color2">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="row">
                                    <div class="bg-color2 item">
                                        <div class="icon color1">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 611.989 611.988" style="enable-background:new 0 0 611.989 611.988;" xml:space="preserve" class="fill1"> <g> <g id="Wi-Fi"> <g> <path d="M305.994,417.769c-30.85,0-55.887,25.037-55.887,55.887s25.038,55.887,55.887,55.887s55.887-25.037,55.887-55.887     S336.843,417.769,305.994,417.769z M605.436,222.369C530.697,133.434,421.549,82.446,305.994,82.446     S81.309,133.434,6.551,222.369c-9.93,11.811-8.402,29.434,3.428,39.363c5.234,4.396,11.587,6.558,17.939,6.558     c7.973,0,15.891-3.391,21.423-9.967c64.084-76.248,157.639-119.989,256.652-119.989c99.013,0,192.568,43.741,256.651,119.971     c5.533,6.576,13.45,9.967,21.424,9.967c6.353,0,12.724-2.143,17.958-6.558C613.837,251.802,615.366,234.161,605.436,222.369z      M305.994,194.22c-82.545,0-160.489,36.419-213.879,99.926c-9.929,11.811-8.402,29.434,3.428,39.363     c5.234,4.396,11.605,6.558,17.958,6.558c7.973,0,15.891-3.391,21.405-9.967c42.716-50.838,105.086-79.993,171.089-79.993     c66.003,0,128.372,29.155,171.107,79.993c5.533,6.595,13.45,9.967,21.404,9.967c6.353,0,12.724-2.143,17.959-6.558     c11.829-9.929,13.356-27.57,3.428-39.363C466.483,230.64,388.539,194.22,305.994,194.22z M305.994,305.994     c-49.553,0-96.331,21.852-128.335,59.948c-9.93,11.811-8.402,29.434,3.428,39.363c5.234,4.396,11.605,6.557,17.958,6.557     c7.973,0,15.891-3.39,21.405-9.966c21.368-25.429,52.552-40.016,85.544-40.016s64.177,14.587,85.544,40.016     c5.533,6.595,13.45,9.966,21.405,9.966c6.353,0,12.724-2.142,17.958-6.557c11.83-9.93,13.357-27.553,3.428-39.363     C402.324,327.846,355.546,305.994,305.994,305.994z"></path> </g> </g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg>
                                            <span class="title color1">
                                                Wifi Centers
                                            </span>
                                        </div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                        <div class="margin-10"></div>
                                        <div class="name color1">The Sutton Place Hotel Edmonton</div>
                                        <div class="address color1">10235 101 Street, Edmonton</div>
                                        <div class="distance color1"><strong class="color1">Distance</strong>: 0.17km</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <hr class="style4">
        </div>
    </div>
    <div class="parks-recreation section" id="parks-recreation">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="left-side">
                    PARKS AND RECREATION
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="row items-container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row items item1">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <div class="row">
                                    <div class="icon">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill1">
                                    <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                    <g><g><g><path d="M387.2,506.9c57.8,7.1,111.7,25.5,161.7,48.6c24.3,11.3,50.2,26.2,70.5,37.7c20.4,12,41,22.8,61.9,33.3L554.6,376l-26.8-47.1l-94.5-165.6c-13.3-23.4-43-31.5-66.5-18.2c-23.5,13.5-31.6,43.2-18.1,66.6L453.2,395l-26.8,23.7l-159.7,91.1l-3.7,2C304.3,503.2,346.8,501.9,387.2,506.9z"/><circle cx="731.8" cy="405.4" r="105.2"/><path d="M983,618.7c-14.9,49.6-38.5,95.6-72,119.4c-32.7,23.7-69.9,25.2-110.9,17c-40.9-8.5-83.3-26.1-124.8-47.1c-21-10.6-41.7-21.4-62.2-33.4c-20.3-11.6-46.3-26.4-70.5-37.7c-50-23.1-103.9-41.6-161.7-48.7c-57.4-7.1-119.2-2.5-174.9,19.7c-55.9,21.8-103.2,59.9-136,104.9C37.9,758.1,15.6,808.6,10,861.3c62.6-83,142.5-142.4,225.4-156.3c82.6-15.2,168.7,9.7,252.1,48.9c21.8,9.9,40.1,19.9,64,32.7c24.1,12.1,48.7,23.8,74.1,33.7c50.9,19.6,105.6,35.7,165.9,36.1c29.9,0.1,61.7-4.1,91.7-16.5c30.2-12.1,57.2-33.5,74.8-59.2C992.5,728.1,996,669.4,983,618.7z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></g>
                                    </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11">
                                <div class="row">
                                    <div class="text">
                                        Kensington Community Centre
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row items item2">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <div class="row">
                                    <div class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill1">
                                        <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                        <g><path d="M406,137.1c31.1,0,56.5,25.4,56.5,56.5s-25.4,56.5-56.5,56.5c-31.1,0-56.5-25.4-56.5-56.5C349.5,162.5,374.9,137.1,406,137.1L406,137.1z M160.3,80.1c-5.6,12.5,5.4,23.7,18.1,15.2l51-49l426.9-2.7l0.9,6.8L460.6,250.1c-29.8,11.1-43.2,36.2-50.4,82.8L530,605l2.2,160L348.9,927.8c-23.4,36.2,1.1,68.7,47.1,54.3l206.5-193.5l-1.9-210.8c1.2-1.6,2.6-1.7,4-0.4l170.4,402.1c16.5,21.6,71.8,9.4,65.6-32.4L584.8,338.2l114.1-119.5l-2.7-134.4l37.9-41.8c0.9-25.7-12-34.3-35.5-32.3l-25.3,24l-458.6,1.3c-3.8,0.2-7.6,1.4-11.1,4L160.3,80.1L160.3,80.1z M640.8,140.3c3,0.2,4,2.3,3.2,6.2l0.1,55.8l-83.6,85.9l-31.3-29.1L640.8,140.3z"/><path d="M182.1,907.4c12.8,0,23.3,10.5,23.3,23.3c0,10.7-7.2,19.7-17,22.4c-1.1,0.3-3.3,33.8-3.3,36.9h-5.9c0,0-1-36.3-2.9-36.8c-10-2.6-17.4-11.7-17.4-22.5C158.8,917.9,169.3,907.4,182.1,907.4L182.1,907.4z"/></g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11">
                                <div class="row">
                                    <div class="text">
                                        Fraserview Golf Academy
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="row items item3">
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <div class="row">
                                    <div class="icon">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1000 1000" enable-background="new 0 0 1000 1000" xml:space="preserve" class="fill1">
                                        <metadata> Svg Vector Icons : http://www.onlinewebfonts.com/icon </metadata>
                                        <g><path d="M406,137.1c31.1,0,56.5,25.4,56.5,56.5s-25.4,56.5-56.5,56.5c-31.1,0-56.5-25.4-56.5-56.5C349.5,162.5,374.9,137.1,406,137.1L406,137.1z M160.3,80.1c-5.6,12.5,5.4,23.7,18.1,15.2l51-49l426.9-2.7l0.9,6.8L460.6,250.1c-29.8,11.1-43.2,36.2-50.4,82.8L530,605l2.2,160L348.9,927.8c-23.4,36.2,1.1,68.7,47.1,54.3l206.5-193.5l-1.9-210.8c1.2-1.6,2.6-1.7,4-0.4l170.4,402.1c16.5,21.6,71.8,9.4,65.6-32.4L584.8,338.2l114.1-119.5l-2.7-134.4l37.9-41.8c0.9-25.7-12-34.3-35.5-32.3l-25.3,24l-458.6,1.3c-3.8,0.2-7.6,1.4-11.1,4L160.3,80.1L160.3,80.1z M640.8,140.3c3,0.2,4,2.3,3.2,6.2l0.1,55.8l-83.6,85.9l-31.3-29.1L640.8,140.3z"/><path d="M182.1,907.4c12.8,0,23.3,10.5,23.3,23.3c0,10.7-7.2,19.7-17,22.4c-1.1,0.3-3.3,33.8-3.3,36.9h-5.9c0,0-1-36.3-2.9-36.8c-10-2.6-17.4-11.7-17.4-22.5C158.8,917.9,169.3,907.4,182.1,907.4L182.1,907.4z"/></g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11">
                                <div class="row">
                                    <div class="text">
                                        Tecumseh Park, Memorial South Park, Gordon Park, Nanaimo Park
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="report-footer">
        <div class="row bg-color1 color2">
            <div class="footer-top-border bg-color2">
            </div>
            <div class="bg-color1 color2 footer-body">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="for-more-info color2">FOR MORE INFORMATION</div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="client-image">
                                <img src="img/client-image.jpg" class="img-responsive">
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="row client-detail color2">
                                HEATHER MAH<br>
                                RE/MAX CREST REALTY</br>
                                CELL: 604.719.7684</br>
                                HEATHER@HEATHERMAH.COM</br>
                                WWW.SOLDBYHEATHERMAH.REALTOR</br>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-2 footer-center">
                    <div class="client-logo">
                        <img src="img/client-logo.jpeg" class="img-responsive">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 footer-right">
                    <div class="row">
                        <div class="title color2">
                            TO ORDER A COMMUNITY FEATURE SHEET, VISIT WWW.VOOYMARKETINGINC.COM
                        </div>
                        <div class="copy-write color2">
                            © 2018 by VOOY MARKETING INC. All rights reserved
                        </div>
                        <div class="detail color2">
                            No part of this document may be reproduced or transmitted in any form or by any means, electronic, mechanical, photocopying, recording, or otherwise, without prior written permission of VOOY MARKETING INC. This feature sheet has been prepared solely for general information purposes only. The publisher and agent(s) are not liable for errors or omissions. No warranties or representations are made of any kind
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
