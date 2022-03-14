@extends('layout.system')

@section('title', 'Nástenka')

@section('content')
    @include('system._partials._title', ['title' => 'Nástenka'])

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Dokumenty</h4>
                    <p class="card-title-desc"></p>

                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#docs-1" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Základné dokumenty</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#docs-2" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block"><b class="text-danger">PRED</b> začatím odbornej praxe</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#docs-3" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-block"><b class="text-danger">PO</b> začatí odbornej praxe</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content p-3 text-muted">
                        <div class="tab-pane active" id="docs-1" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/InfoList_OP1.pdf') }}" class="dashboard-file-link" target="_blank">
                                                <i class="fa fa-file-pdf fa-2x"></i>
                                                <div>Informačný list predmetu Odborná prax 1 / bakalárske štúdium</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/InfoList_OP2.pdf') }}" class="dashboard-file-link" target="_blank">
                                                <i class="fa fa-file-pdf fa-2x"></i>
                                                <div>Informačný list predmetu Odborná prax 2 / magisterské štúdium</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/Zoznam firiem 2015.xlsx') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-excel fa-2x"></i>
                                                <div>Zoznam firiem pre odbornú prax</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="docs-2" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/2_OPx_zmluva_spolupraca.doc') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-word fa-2x"></i>
                                                <div>Zmluva o spolupráci v odbornej praxi medzi fakultou a pracoviskom odbornej praxe</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/3_OPx_dohoda_student.doc') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-word fa-2x"></i>
                                                <div>Dohoda o odbornej praxi študenta</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="docs-3" role="tabpanel">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/4_OPx_vykaz.doc') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-word fa-2x"></i>
                                                <div>Výkaz o vykonaní odbornej praxe</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/6_OPx_osvedcenie.doc') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-word fa-2x"></i>
                                                <div>Osvedčenie o absolvovaní odbornej praxe</div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <a href="{{ asset('docs/5_OPx_hodnotenie.doc') }}" class="dashboard-file-link">
                                                <i class="fa fa-file-word fa-2x"></i>
                                                <div>Záverečné hodnotenie študenta v organizácii</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Testovacie údaje</h4>

                    <p>Heslo je pre každého používateľa: <b>admin</b></p>

                    <ul>
                        <li>Vedúci fakulty - <b>admin</b></li>
                        <li>Vedúci pracoviska - <b>leader1</b></li>
                        <li>Vedúci pracoviska - <b>leader2</b></li>
                        <li>Profesor - <b>lecturer1</b></li>
                        <li>Profesor - <b>lecturer2</b></li>
                        <li>Študent - <b>student1</b></li>
                        <li>Študent - <b>student2</b></li>
                        <li>Študent - <b>student3</b></li>
                        <li>Majiteľ firmy - <b>owner1</b></li>
                        <li>Majiteľ firmy - <b>owner2</b></li>
                        <li>Zamestnanec firmy - <b>employee1</b></li>
                    </ul>

                    <h4 class="card-title">Pravomoci pre zamestnancov školy</h4>

                    <ul>
                        <li>Používatelia - zobraziť dokáže každý zamestnanec a upravovať dokáže každý zamestnanec</li>
                        <li>Spoločnosti - zobraziť dokáže každý zamestnanec a upravovať dokáže každý zamestnanec</li>
                        <li>Pracoviská - zobraziť dokáže každý zamestnanec a upravovať dokáže iba vedúci fakulty</li>
                        <li>Študíjne programy - zobraziť dokáže každý zamestnanec a upravovať dokáže iba vedúci fakulty alebo vedúci pracoviska</li>
                        <li>Predmety - zobraziť dokáže každý zamestnanec a upravovať dokáže každý zamestnanec</li>
                        <li>Typy zmluv - zobraziť dokáže každý zamestnanec a upravovať dokáže iba vedúci fakulty alebo vedúci pracoviska</li>
                        <li>Statusy - zobraziť dokáže každý zamestnanec a upravovať nedokáže nikto</li>
                        <li>Odborné praxe - zobraziť profesor iba svoje odborné praxe, vedúci pracoviska praxe pracoviska a vedúci fakulty všetky</li>
                    </ul>

                    <h4 class="card-title">Pravomoci pre zamestnancov firmy</h4>

                    <ul>
                        <li>Zamestnanci - zobraziť dokáže iba majiteľ firmy a dokáže priradiť zamestnanca k praxi</li>
                        <li>Odborné praxe - zobraziť dokáže každý zamestnanec (ak nie je majiteľ iba svoje)</li>
                    </ul>

                    <h4 class="card-title">Odborná prax</h4>

                    <p>Študent je pozvaný profesorom do systému cez (Administrácia > Používatelia) a následne si vytvorí odbornú prax. Môže pozvať spoločnosť v ktorej pracuje ak ju nenašiel medzi existujúcimi. Následne pozvaný majiteľ firmy sa zaregistruje do systému a pozve zodpovednú osobu do systému ak v ňom nie je. Priradí zamestnanca k odbornej praxi, čím sa schváli odborná prax. Študent nahráva do systému záznamy a má konverzáciu s profesormi v sekcii Komentáre. Na konci profesor nahrá výkaz k odbornej praxi, čím sa dokončí prax.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
