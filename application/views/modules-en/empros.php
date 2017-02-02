<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            <h3><span>emPros</span> - Prosody Parser</h3>
            <h4>About the tool</h4>
            <h5>What is it good for? What does it do?</h5>
            <p>The program analyses and transcribes the intonation of verbal utterances in spontaneous communication. After the retrieval of the acoustic parameters from the archived recordings and their processing and stylization per speaker, it labels the utterances’ intonation relative to the participants’ individual range of voice. The program was designed mainly with the analysis of multi-member interactions in mind, but it can also be used to process texts read out loud, as well as monologues.</p>
            <h5>What is the input?</h5>
            <p>The audio file recording the conversation and a respective annotation, containing the temporal position of the utterances on a separate axis (annotation level) for each speaker. There are no restrictions concerning the number of speakers, the segmentation of the utterances or the content of the labels. Empty labels are interpreted as the speaker in question being silent.
            </p>
            <h5>What is the output?</h5>
            <p>The annotation returned as an output describes the utterances on four levels for each speaker. The first level tags the utterances into melody segments, assigning one of the five categories to each segment: "rise", "fall", "descending", "ascending", or "level". The second level places the starting and end points of the melody segments within the speaker’s individual voice range divided into five levels  (L2 &lt; L1 &lt; M &lt; H1 &lt; H2). 
                The third level connects the original values measured in Hertz to the relative values of the previous level. The fourth level separates the voiced ("V") and voiceless ("U") segments of the speech.</p>
            <h5>An example:</h5>
            <p>The sample in the source code’s <i>input</i> folder (<i>sample.wav</i>, <i>sample.TextGrid</i>) contains the archived recording of a dialogue (to preserve the speakers’ anonymity, only their intonation can be heard on the recording) as well as the utterances’ intervals per speaker ("speakerA" and "speakerB"). The output is the <i>sample_pitch.TextGrid</i> file in the <i>output</i> folder, containing the intonation of the utterances on 8 (4+4) annotation levels. Overlapping speech is not analysed.</p>
            <h4>For developers</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Source</td>
                        <td>
                            <a href="https://github.com/szekrenyesi/prosotool" target="_blank">https://github.com/szekrenyesi/prosotool</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Source code</td>
                        <td><a href="http://www.fon.hum.uva.nl/praat/" target="_blank">Praat</a> (6.0.13) script</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>At least one sound file in .wav format, together with a Praat TextGrid file under the same name. Any number of such pairs (sound + annotation) can be placed in the <i>input</i>  folder. </td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>A text file in Praat TextGrid format, which is placed in the <i>output</i> folder. Naming convention:  [input name] + "_pitch".  Several further subfolders (their names following that of the original input) will be created in the output folder, containing partial results.
                            The folder "sp_sep" contains a version of the speakers' speech which had been cleaned from overlaps and is isolated, as generated during the preprocessing.</td>
                    </tr>
                    <tr>
                        <td>Execution</td>
                        <td>                            
                            <span class="code">Praat prosotool.praat &lt;input_path&gt; &lt;stylization&gt; &lt;smoothing&gt; &lt;pitch_extraction&gt; &lt;operating_system&gt; </span>
                            <br>Meaning and value range of the options:
                            <ul>
                                <li><i>INPUT_PATH</i> : Directory path of the input folder. Value range: string
                                <li><i>STYLIZATION</i> : Resolution of the stylisation of the F0 curve. A higher value results in a stronger slytisation (coarser resolution). Value range: integers
                                <li><i>SMOOTHING</i> : The parameter determining the F0 curve smoothing. A lower value results in a stronger smoothing. Value range: real numbers
                                <li><i>PITCH_EXTRACTION</i> : The determining method of the F0 measurements' parameters . Value range: standard | dynamic
                                <li><i>OPERATING_SYSTEM</i> : Running environment: to be specified because of folder actions. Value range: windows | unix
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>Licence</td>
                        <td>GPL</td>
                    </tr>                   
                </table>
            </div>                        
        </article>
    </div>
</section>