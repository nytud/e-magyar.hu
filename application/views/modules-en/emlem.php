<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emLem</span> - szótövesítő</h3>

            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>The morphological analyser offers a detailed analysis down to the level of morphemes for each word form: 
            beyond identifying endings, it decomposes each word into its components and identifies derivational suffixes. 
            Most modules using the output of the morphological analysis do not require such a deep analysis. Identifying 
            the lemma of a given word form with its part-of-speech and its inflections (jel / rag) is sufficient. The 
            lemmatiser computes the lemma of each word form based on the analysis of the morphological tagger, it computes 
            its original part-of-speech (in case of a derived word), it identifies inflectional categories and returns 
            these instead of (or besides) a detailed analysis.
                <br>The morphological analyser often produces several analyses in different detail for the same word form, 
                with the same lemma, part-of-speech and inflectional categories. The reason for this is that the lemma-register 
                of the lemmatiser contains many morphologically complex lexical units, may they be compounds or derivations or 
                others. At the same time the lemmatiser generates the majority of these forms productively, as well. After 
                lemmatisation these real or apparent disambiguities disappear. Accordingly, the output of the lemmatiser can 
                support tasks like POS disambiguation, named entity recognition (NER) or syntactic parsing.</p>
            <h5>What is the input?</h5>
            <p>The input of the lemmatiser is the output of the morphological analyser. Lemmatisation requires the surface forms 
            and lexical form (only in case of stems and derivational suffixes) of the morphs making up the word, as well as 
            the respective morphosyntactic tag.</p>
            <h5>What is the output?</h5>
            <p>Based on the morphological analysis the lemmatiser returns the lemma, POS tag and the simplified analysis 
            containing the inflectional categories..</p>
            <h5>An example:</h5>
            <p>The output of the morphological analysis:</p>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>fejetlenséget</th>
                        </tr>
                    </thead> 
                    <tbod>
                        <tr>
                            <td>1.</td>
                            <td>fej<span class="group1">[/N]</span>etlen[_Abe/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>fej<span class="group3">[/V]</span>etlen[_NegPtcp/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td>fej~etlen[/Adj]ség[_Nz_Abstr/N]et[Acc]</td>
                        </tr>
                        <tr>
                            <td>4.</td>
                            <td>fej~etlen~ség[/N]et[Acc]</td>
                        </tr>
                    </tbod>
                </table>
            </div>
            <p>
                [/N] noun
                <br>[/Adj] adjective
                <br>[_Abe/Adj] Derivational suffix: adjectiviser negative suffix (its result: adjective)
                <br>[Acc] accusativus
                <br>[_Nz_Abstr/N] Derivational suffix: nominaliser suffix (its result: noun)
                <br>[_NegPtcp/Adj] Derivational suffix: negative passive (its result: adjective)
            </p>

            <p>Of the above analyses the lemmatiser produces the only simplified analysis below:
                <br><b>fejetlenség[/N][Acc]</b>
            </p>
            <p>The remaining semantic disambiguity (depending on whether <i>fej</i> is interpreted as a noun or a verb) 
                cannot be resolved on the level of morphological analysis or part-of-speech disambiguation.</p>

            <br/>


            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td><a href="https://github.com/dlt-rilmta/hunlp-GATE/tree/master/Lang_Hungarian/resources/hfst" target="_blank">https://github.com/dlt-rilmta/hunlp-GATE/tree/master/Lang_Hungarian/resources/hfst</a>
                            <br>Additionally, the HFST-lookup programme running on the given platform needs to be downloaded from the website <a href="http://apertium.projectjj.com" target="_blank">http://apertium.projectjj.com</a>.</td>
                    </tr>
                    <tr>
                        <td>Source code</td>
                        <td>Originally written in C++ , ported to Java, it calls the hfst-lookup programme of the Helsinki Finite-State Transducer (HFST) toolkit, generating its output from its analyses.</td>
                    </tr>
                    <tr>
                        <td>Input format</td>
                        <td>Text in Unicode encoding, one word per row.</td>
                    </tr>
                    <tr>
                        <td>Output format</td>
                        <td>The analyses of the input word (each analysis is in a separate row) are themselves separated by an empty row. The format of the analysis is: input word [tab] detailed analysis [tab] lemma [tab] Part-of-speech and inflection tags.</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td><span class="code">java -jar hfst-wrapper.jar</span></td>
                    </tr>
                    <tr>
                        <td>Licence</td>
                        <td>GNU Lesser General Public License (LGPL v3)</td>
                    </tr>
                    <tr>
                        <td>Others</td>
                        <td>In order for the lemmatiser to run a Java JRE environment is required. The lemmatiser uses the hfst-lookup programme included in the a HFST toolkit, so this and the binary lexicon of the analyser need to be placed next to the lemmatiser. The configuration of the lemmatiser is included in the hfst-wrapper.props file.</td>
                    </tr>
                </table>                
            </div>

        </article>
    </div>
</section>
