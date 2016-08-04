<article>
    <h4>Az eszközről</h4>
    <h5>Mire jó? Mit csinál?</h5>
    <p>A Speech Activity Detection (SAD) modul beszédszegmentálást végez audió fájlokon. A fájlokat háromféle szegmensre bontja: beszéd, csend és zaj. A beszéddetekció első lépése a többi beszédfeldolgozási műveletnek.</p>
    <h5>Mi a bemenet?</h5>
    <p>.wav, .mp3 vagy .raw kiterjesztésű audió fájl. .raw fájlt esetén gondoskodni kell a megfelelő paraméterekről (16 kHz, 16 bit little endian).</p>
    <h5>Mi a kimenet?</h5>
    <p>A modul háromféle kimenetet tud készíteni: szegmensfájl (szegmensek és hosszuk felsorolása) SHOUT formátumban, szegmensekre darabolt audió, illetve szegmenstípusonként egyesített beszéd, csend, és zajfájl.</p>
    <h5>Egy példa a működésre.</h5>
    <p>Példa bemenet: rádióadás
        <br>Példa kimenet: SPEAKER SpeechNonSpeech 5 1.220 1.040 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt; SPEAKER SpeechNonSpeech 5 2.260 3.950 &lt;NA&gt; &lt;NA&gt; SOUND &lt;NA&gt; SPEAKER SpeechNonSpeech 5 6.210 0.750 &lt;NA&gt; &lt;NA&gt; SPEECH &lt;NA&gt;</p>

    <h4>Fejlesztőknek</h4>
    <h5>Hol található? (bináris/forrás)</h5>
    <p><a href="https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py" target="_blank">https://github.com/juditacs/hunspeech/blob/master/speech_activity_detection/sad.py</a></p>
    <h5>Milyen nyelven írt?</h5>
    <p>Python3</p>
    <h5>Input/output adatformátum?</h5>
    <p>Bemeneti: .wav, .mp3, vagy bármilyen egyéb, a SoX (Sound Exchange) eszköz által támogatott audio formátum. Kimeneti: Két, a SHOUT eszköz kiemeneteként előállított, RTTM (Rich Transcription Time Marked) kompatibilis fájl, és/vagy szegmensenként egy-egy audió fájl (wav), és/vagy szegmensítpusonként egy egyesített audió fájl (wav).</p>
    <h5>Hogyan futtatható?</h5>
    <p>python3 sad.py -i input.wav -m shout.sad (ld. még --help)</p>
    <h5>Milyen liszensz vonatkozik rá? (Ha nem a teljesen nyílt CC BY)</h5>
    <p>GPL.</p>
    <h5>További információk</h5>
    <p></p>
</article>

