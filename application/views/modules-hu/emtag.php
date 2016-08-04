<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">

        <article>

            <h3 id="emtag"><span>emTag</span> - egyértelműsítő</h3>

            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>A program a betanult anyag alapján meghatározza a korábban tokenekre bontott mondat minden tokenjének szótövét és szófaját,
                majd ezt címkével jelöli is. </p>
            <h5>Mi a bemenet?</h5>
            <p>A program minden mondatot külön kezel, a bemenet így tokenekre bontott mondatok sorozata.</p>
            <h5>Mi a kimenet?</h5>
            <p>A program kimenetként a bemeneti tokenek és az egyes tokenekhez rendelt szótőt és szófaji címkéket adja.</p>

            <h5>Egy példa a működésre.</h5>
            <p><i>A kastély nem vár.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>A#</td>
                        <td>a#</td>
                        <td>[/Det|art.Def]</td>
                    </tr>
                    <tr>
                        <td>kastély#</td>
                        <td>kastély#</td>
                        <td>[/N][Nom]</td>
                    </tr>
                    <tr>
                        <td>nem#</td>
                        <td>nem#</td>
                        <td>[/Adv]</td>
                    </tr>
                    <tr>
                        <td>vár#</td>
                        <td>vár#</td>
                        <td class="group1">[/N][Nom]</td>
                    </tr>
                    <tr>
                        <td>.#</td>
                        <td>.#</td>
                        <td>[/PUNCT]</td>
                    </tr>	
                </table>
            </div>

            <p><i>A kastély nem vár senkire.</i></p>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <td>A#</td>
                        <td>a#</td>
                        <td>[/Det|art.Def]</td>
                    </tr>
                    <tr>
                        <td>kastély#</td>
                        <td>kastély#</td>
                        <td>[/N][Nom]</td>
                    </tr>
                    <tr>
                        <td>nem#</td>
                        <td>nem#</td>
                        <td>[/Adv]</td>
                    </tr>
                    <tr>
                        <td>vár#</td>
                        <td>vár#</td>
                        <td class="group1">[/V][Prs.NDef.3Sg] </td>
                    </tr>
                    <tr>
                        <td>senkire#</td>
                        <td>senki#</td>
                        <td>[/N|Pro][Subl]</td>
                    </tr>
                    <tr>
                        <td>.#</td>
                        <td>.#</td>
                        <td>[/PUNCT]</td>
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
                                <a href="https://github.com/ppke-nlpg/purepos" target="_blank">https://github.com/ppke-nlpg/purepos</a>                             
                            </td>
                        </tr>
                        <tr>
                            <td>Forrásnyelv</td>
                            <td>Java</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Soronként egy mondat, a tokenek szóközzel elválasztva.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>Ugyanaz, mint az input, de a tokenekhez # jellel elválasztva hozzá van fűzve a szótő és a címke.</td>
                        </tr>
                        <tr>
                            <td>Futtatás</td>
                            <td>
                                <span class="code">java -jar purepos-&lt;version&gt;.jar tag -m betanított.model [-i input.txt] [-o output.txt]</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licensz</td>
                            <td>LGPL-3.0</td>
                        </tr>
                        <tr>
                            <td>További információk</td>
                            <td>Dependencia a fordításhoz: maven 2.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>