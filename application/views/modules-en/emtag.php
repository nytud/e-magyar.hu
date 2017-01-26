<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">

        <article>

            <h3 id="emtag"><span>emTag</span> - egyértelműsítő</h3>

            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>Based on the training data the programme determines the lemma and part-of-speech of every token that had been 
            identified earlier, and tags these, as well.</p>
            <h5>What is the input?</h5>
            <p>The programme deals with every sentence separately. Accordingly, the input is a series of senteces divided into tokens.</p>
            <h5>What is the output?</h5>
            <p>The programme returns the input tokens and with their word stem and POS tags, respectively..</p>

            <h5>An example:</h5>
            <p><i>A kastély nem vár.]</i></p>
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

            <h4>For developers:</h4>

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Source</td>
                            <td>
                                <a href="https://github.com/ppke-nlpg/purepos" target="_blank">https://github.com/ppke-nlpg/purepos</a>                             
                            </td>
                        </tr>
                        <tr>
                            <td>Source code</td>
                            <td>Java</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>One sentence per row, the tokens divided by a space.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>The same as the input, but the token is followed by its lemma and the tag assigned to a it, following a # tag.</td>
                        </tr>
                        <tr>
                            <td>Execution</td>
                            <td>
                                <span class="code">java -jar purepos-&lt;version&gt;.jar tag -m betanított.model [-i input.txt] [-o output.txt]</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>LGPL-3.0</td>
                        </tr>
                        <tr>
                            <td>Further information</td>
                            <td>Compile dependency: maven 2.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>