<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emner"><span>emNer</span> - tulajdonnév-felismerő</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>Az emNer automatikus tulajdonnév-felismerő rendszer azonosítja a folyó szövegben található tulajdonneveket, 
                és besorolja őket az előre meghatározott névkategóriák valamelyikébe (személynév, intézménynév, földrajzi név, egyéb).</p>
            <h5>Mi a bemenet?</h5>
            <p>Az elemzőlánc előző szintjein feldolgozott magyar nyelvű szövegekkel dolgozik, amelyek már i) szavakra és mondatokra vannak bontva,
                ii) a szavakhoz hozzá van rendelve a tövük és a teljes morfológiai elemzésük. A tulajdonnév-felismerő modul hatékony 
                működéséhez szükségesek ezek az információk.</p>
            <h5>Mi a kimenet?</h5>
            <p>A modul a szavakra és mondatokra bontott szöveg minden egyes tokenjéhez hozzárendel egy címkét, ami megmondja,
                hogy az adott szó i) tulajdonnév-e, ha igen, akkor ii) milyen kategóriájú tulajdonnév, iii) egy- vagy többelemű-e,
                ha ez utóbbi, akkor iv) a tulajdonnév kezdő, közbülső vagy záró eleme-e. 
                <br>A kimenetben az előző szintek elemzése is megmarad, és a tulajdonnév-felismerő modul is hozzáteszi a saját címkéit.</p>
            <h5>Egy példa a működésre.</h5>
            <p>A példamondatban meg van jelölve minden tokenaz alábbi címkékkel: 0 = nem tulajdonnév, B-PER: egy többelemű személynév első eleme,
                E-PER: egy többelemű személynév utolsó eleme, B-ORG: egy többelemű intézmény első eleme, E-ORG: egy többelemű intézménynév 
                utolsó eleme, 1-ORG: egyelemű intézménynév.</p>
            
            <p><i>[...] közölte Wolf László, az OTP Bank vezérigazgató-helyettese az MTI érdeklődésére.</i></p>

            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>közölte</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>Wolf</td>
                        <td>B-PER</td>
                    </tr>
                    <tr class="group1">
                        <td>László</td>
                        <td>E-PER</td>
                    </tr>
                    <tr>
                        <td>,</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>az</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>OTP</td>
                        <td>B-ORG</td>
                    </tr>
                    <tr class="group1">
                        <td>Bank</td>
                        <td>E-ORG</td>
                    </tr>
                    <tr>
                        <td>vezérigazgató-helyettese</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>az</td>
                        <td>0</td>
                    </tr>
                    <tr class="group1">
                        <td>MTI</td>
                        <td>1-ORG</td>
                    </tr>
                    <tr>
                        <td>érdeklődésére</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
            <br/>

            <h4>Fejlesztőknek</h4>       

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Forrás</td>
                            <td>
                                <a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a>                         
                            </td>
                        </tr>
                        <tr>
                            <td>Forrásnyelv</td>
                            <td>Python 3</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>UTF-8 karakterkódolású sima szövegfájl egy sor - egy szó formátumban, a mondathatárokat egy üres sor jelöli, az első oszlopban maga a szövegszó szerepel, minden további annotáció tabbal elválasztott oszlopokban van hozzáadva.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>Ugyanaz, mint az input, melynek utolsó oszlopa tartalmazza a tulajdonnév-címkéket.</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                Lásd a README-ben. <!--<a href="https://github.com/ppke-nlpg/HunTag3" target="_blank">https://github.com/ppke-nlpg/HunTag3</a>-->
                            </td>
                        </tr>
                        <tr>
                            <td>Licensz</td>
                            <td>GNU Lesser General Public License v3.0</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>