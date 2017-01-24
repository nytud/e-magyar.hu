<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3 id="emmorph"><span>emMorph</span> - Morphological analyser</h3>

            <h4>About the tool</h4>
            <h5>What does it do?</h5>
            <p>The task of the morphological tagger in the toolchain is to assign all possible morphological and morphosyntactic analyses to 
            each word of the input text. It determines every possible analyis that could apply to a given word form irrespective of its context 
            (<i>vár</i>, e.g. would have an analysis as a noun and as a verb, too (Engl.: <i>wait</i> / <i>castle</i>)). The tool lemmatises the 
            word form, determines the main POS categories, analyses the endings, marks possible morpheme boundaries, and so the boundaries of 
            compunds, as well.
                <br>The tagger integrates the knowledge of other similar tools that have so far been available for Hungarian. According to 
                its developers it is the most accurate tool of its kind with the widest lexicon to rely on. It is freely accessible, customisable 
                to specific NLP requirements and to language varieties, while being based on a computational linguistic model (so-called 
                finite-state technology) that ensures the fastest possible runtime.</p>
            <h5>What is the input?</h5>
            <p>The system presented here being a toolchain, with analysing steps building one on the other, respectively, the input of the 
            morphological tagger is a word form in a row.
                <br>The previous language processing step (determining sentence- and word boundaries), is carried out by the tokeniser (emToken), 
                while the following step (choosing the right morphological analysis from those offered by emMorph) is then carried out by a 
                disambiguation algorithm, emTag.</p>
            <h5>What is the output?</h5>
            <p>The output of the tagger is the totality of morpheme-sequences with their respective analyses that could make up the character 
            string in question according to the rules of Hungarian. This often amounts to a huge number of possible analyses most of which a 
            speaker would not even be aware of. The majority of these analysis routes can then be filtered out depending on the higher level 
            task using the morphological tagger, thus constraining possible analyses.</p>
            <h5>An example of the tagging.</h5>
            <p>The example below is supposed to illustrate two phenomena: on the one hand a disambiguity that is hard to detect for a speaker, 
            on the other hand the case of a word form stored as one unit in the lexicon of the tagger but being able to be decomposed into 
            further components. Depending on the application needed, the analysis ['fejetlenség' + accusative] (which is also the most obvious 
            alternative for speakers) is sufficient in most cases. Using emLem, we we do arrive at this analysis, but the remaining semantic 
            disambiguity (depending on whether <i>fej</i> is interpreted as a noun or a verb) cannot be resolved on the level of morphological 
            analysis or part-of-speech disambiguation.
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
                <br>[_Abe/Adj] adjectivizer negative suffix (its result: adjective)
                <br>[Acc] accusative
                <br>[_Nz_Abstr/N] derivational suffix: nominalizer suffix (its result: noun)
                <br>[_NegPtcp/Adj] Derivational suffix: negative passive (its result: adjective)
            </p>
           
            <br/>
            
            <p>
                <a href="<?php echo base_url(); ?><?= $this->config->item('language_abbr'); ?>/textmodules/emmorph_codelist" target="_blank">The full list of morphological codes</a>
            </p>
            
            <br/>
                        
            <h4>For developers:</h4>

            <div class="table-responsive">
                <table class="table table-striped">                
                    <tbody>
                        <tr>
                            <td>Source</td>
                            <td>
				<a href="https://github.com/dlt-rilmta/emMorph" target="_blank">https://github.com/dlt-rilmta/emMorph</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Source language</td>
                            <td>The tagger is basically a finite state translator (transducer), which – based on a register of lemmata, a register of endings and a morphophonological description (a grammar) – transforms the surface word form (a character string) into another character string made up of morphemes and morphological codes. The database of the tagger contains the description of the linguistic data in a specific format. Preparing the transducer and running the tagger can be carried out via the Helsinki Finite-State Transducer toolkit (HFST), implemented in C++. 
                            The lexicon that can be interpreted by HFST (in lexc) is generated from the primary source of the morphology by programmes implemented in perl..</td>
                        </tr>
                        <tr>
                            <td>Input</td>
                            <td>Text in unicode encoding, one word per row.</td>
                        </tr>
                        <tr>
                            <td>Output</td>
                            <td>The analyses of the input word (each analysis is in a separate row) are themselves separated by an empty row. The format of the analysis is: input word [tab] analysis [tab] weight. Weight in the present implementation is set to 1 if an analysis exists, and to infinite (inf) if no analysis is available.</td>
                        </tr>
                        <tr>
                            <td>Execution</td>
                            <td>
                                <span class="code">hfst-lookup --cascade=composition hu.hfst</span>
                                <br/>
                                <span class="code">hfst-lookup --pipe-mode=input --cascade=composition hu.hfstol &lt;intext &gt;outtext</span>
                                <br/>
				
                                The tagger may be run with the lookup programmes of the HFST toolkit.
                            </td>
                        </tr>
                        <tr>
                            <td>Licence</td>
                            <td>The database is licensed under the Creative Commons Attribution-NonCommercial-ShareAlike 4.0 (CC BY-NC-SA) licence. GNU General Public License (GPL v3) converts the primary source of the database.</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </article>
    </div>
</section>
