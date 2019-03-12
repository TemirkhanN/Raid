package Player;

import static org.junit.Assert.*;

import org.junit.Test;

public class PlayerPresetTest {
    private final PlayerPreset playerPreset = new PlayerPreset("Some name");

    @Test
    public void name() {
        assertEquals("Some name", playerPreset.getName());
    }
}
