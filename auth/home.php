<div class="container">


    <div class="row">
        <div class="col s12 m6">
            <div class="card-panel light-green darken-1">
                <span class="white-text valign-wrapper center-align">Clique no ícone&nbsp<i class="material-icons">gps_fixed</i>&nbsppara pegar sua localização atual.
                </span>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card-panel light-green darken-1" id="tutorial" style="cursor:pointer">
                <span class="white-text">Como reciclar de forma correta? Clique aqui
                </span>
            </div>
        </div>
    </div>


    <div class="col s12" style="margin-top: 20px;">
        <div id='map' style='width: 100%; height: 300px;'></div>
    </div>

    <div class="fixed-action-btn toolbar">
        <a class="btn-floating btn-large light-green darken-1 modal-trigger" href="#modal1">
            <i class="large material-icons">recycling</i>
        </a>

    </div>

    <!-- modal para registro de reciclagem -->
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content">
            <h4>Nova reciclagem</h4>

            <div class="row container">
                <form class="col s12">
                    <div class="row">
                        <div class="input-field col s6">
                            <input placeholder="Placeholder" id="first_name" type="text" class="validate">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input disabled value="I am not editable" id="disabled" type="text" class="validate">
                            <label for="disabled">Disabled</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            This is an inline input field:
                            <div class="input-field inline">
                                <input id="email" type="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Email</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>

    <!-- modal para tutorial de reciclagem -->
    <div id="modaltutorial" class="modal modal-fixed-footer">
        <div class="modal-content">
            <h4>Modal Header</h4>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Agree</a>
        </div>
    </div>
</div>