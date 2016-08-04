<section class="fullpanel">
    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-2 col-lg-offset-3 text-justify">
        <article>
            
            <h3><span>emSad</span> - beszédfelismerő</h3>
            <h4>Az eszközről</h4>
            <h5>Mire jó? Mit csinál?</h5>
            <p>A Speech Activity Detection (SAD) modul beszédszegmentálást végez audió fájlokon. A fájlokat háromféle szegmensre bontja:
                beszéd, csend és zaj. A beszéddetekció első lépése a többi beszédfeldolgozási műveletnek.</p>
            <h5>Mi a bemenet?</h5>
            <p>.wav, .mp3 vagy .raw kiterjesztésű audió fájl. .raw fájlt esetén gondoskodni kell a megfelelő paraméterekről 
                (16 kHz, 16 bit little endian).</p>
            <h5>Mi a kimenet?</h5>
            <p>A modul háromféle kimenetet tud készíteni: szegmensfájl (szegmensek és hosszuk felsorolása) SHOUT formátumban, szegmensekre 
                darabolt audió, illetve szegmenstípusonként egyesített beszéd, csend, és zajfájl.</p>
            <h5>Egy példa a működésre.</h5>
            <p>Bemenet: rádióadás
                <br>Kimenet: SPEAKER SpeechNonSpeech 5 1.220 1.040 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt; SPEAKER SpeechNonSpeech 5 2.260 3.950 &lt;NA&gt; &lt;NA&gt; SOUND &lt;NA&gt; SPEAKER SpeechNonSpeech 5 6.210 0.750 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt;</p>

            <br/>
            <h4>Fejlesztőknek</h4>

            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <td>Forrás</td>
                        <td>
                            <a href="https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py</a>
                        </td>
                    </tr>
                    <tr>
                        <td>Forrásnyelv</td>
                        <td>Python 3</td>
                    </tr>
                    <tr>
                        <td>Input</td>
                        <td>.wav, .mp3, vagy bármilyen egyéb, a SoX (Sound Exchange) eszköz által támogatott audio formátum</td>
                    </tr>
                    <tr>
                        <td>Output</td>
                        <td>Két, a SHOUT eszköz kiemeneteként előállított, RTTM (Rich Transcription Time Marked) kompatibilis fájl, és/vagy szegmensenként egy-egy audió fájl (wav), és/vagy szegmensítpusonként egy egyesített audió fájl (wav)</td>
                    </tr>
                    <tr>
                        <td>Futtatás</td>
                        <td>                            
                            <span class="code">python3 sad.py -i input.wav -m shout.sad (ld. még --help)</span> 
                        </td>
                    </tr>
                    <tr>
                        <td>Licensz</td>
                        <td>GPL</td>
                    </tr>                   
                </table>
            </div>

        </article>
    </div>
</section>
