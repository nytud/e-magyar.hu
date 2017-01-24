<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emcons"><span>emCons</span> - Constituency parser</h3>
            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>Constituency parsing of a sentence reveals what phrases the words of a sentence can create when combined with each other, and how they create a whole sentence.</p>
            <h5>What is the input?</h5>
            <p>The input is a text that had been tokenised and morphologically disambiguated. The words of the sentence (input tokens) arranged in a parse tree: every token is assigned an appropriate tag.</p>
            <h5>What is the output?</h5>
            <p>The output is a parse tree of the words of a sentence and of all the potential syntactic relations of every possible phrase that may be created of these. </p>

            <h5>An example:</h5>
            
            <p><i>Az exkatonát kórházba szállították, ahol két műtétet is végrehajtottak rajta.</i></p>

            <div class="table-responsive">
                <table class="table fixed">
                    <tr>
                        <td>Az</td>
                        <td>az</td>
                        <td>DET</td>
                        <td class="break">Definite=Def|PronType=Art</td>
                        <td class="group1">(ROOT(CP(NP*</td>
                    </tr>
                    <tr>
                        <td>exkatonát</td>
                        <td>exkatona</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">*)</td>
                    </tr>
                    <tr>
                        <td>kórházba</td>
                        <td>kórház</td>
                        <td>PROPN</td>
                        <td class="break">Case=Ill|Number=Sing</td>
                        <td class="group1">(NP*)</td>
                    </tr>
                    <tr>
                        <td>szállították</td>
                        <td>szállít</td>
                        <td>VERB</td>
                        <td class="break">Definite=Def|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">(V_(V0*))</td>
                    </tr>
                    <tr>
                        <td>,</td>
                        <td>,</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">*</td>
                    </tr>
                    <tr>
                        <td>ahol</td>
                        <td>ahol</td>
                        <td>ADV</td>
                        <td class="break">PronType=Rel</td>
                        <td class="group1">(ADVP*)</td>
                    </tr>
                    <tr>
                        <td>két</td>
                        <td>két</td>
                        <td>NUM</td>
                        <td class="break">Case=Nom|NumType=Card|Number=Sing</td>
                        <td class="group1">(NP*</td>
                    </tr>
                    <tr>
                        <td>műtétet</td>
                        <td>műtét</td>
                        <td>NOUN</td>
                        <td class="break">Case=Acc|Number=Sing</td>
                        <td class="group1">*)</td>
                    </tr>
                    <tr>
                        <td>is</td>
                        <td>is</td>
                        <td>CONJ</td>
                        <td class="break">_</td>
                        <td class="group1">(C0*)</td>
                    </tr>
                    <tr>
                        <td>végrehajtottak</td>
                        <td>végrehajt</td>
                        <td>VERB</td>
                        <td class="break">Definite=Ind|Mood=Ind|Number=Plur|Person=3|Tense=Past|VerbForm=Fin|Voice=Act</td>
                        <td class="group1">(V_(V0*))</td>
                    </tr>
                    <tr>
                        <td>rajta</td>
                        <td>rajta</td>
                        <td>PRON</td>
                        <td class="break">Case=Sup|Number=Sing|Person=3|PronType=Prs</td>
                        <td class="group1">(NP*)</td>
                    </tr>
                    <tr>
                        <td>.</td>
                        <td>.</td>
                        <td>PUNCT</td>
                        <td class="break">_</td>
                        <td class="group1">*))</td>
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
                                <a href="http://rgai.inf.u-szeged.hu/magyarlanc" target="_balnk">http://rgai.inf.u-szeged.hu/magyarlanc</a>                              
                            </td>
                        </tr>
                        <tr>
                            <td>Source code</td>
                            <td>Java</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Input is the output of the POS tagger (one token per row, separate column for word form with its lemma and morphological analysis), the respective sentences divided by an empty line.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>One token per row, a separate column for word form, lemma, morphological analysis and syntactic parsing.</td>
                        </tr>
                        <tr>
                            <td>Execution</td>
                            <td>
                                <span class="code">java -Xmx2G -jar magyarlanc-3.0.jar -mode constparse -input in.txt -output out.txt</span>                               
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>The database is licensed under the Creative Commons Attribution-ShareAlike 4.0 (CC-BY-SA) licence. GNU General Public License (GPL v3) converts the primary source of the database).</td>
                        </tr>                       
                    </tbody>
                </table>
            </div>

        </article>  
    </div>
</section>