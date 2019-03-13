package Player;

import static org.junit.Assert.*;

import org.junit.Test;

public class PlayerPresetTest {
    private final PlayerPreset playerPreset = new PlayerPreset("Some name", 123);

    @Test
    public void name() {
        assertEquals("Some name", playerPreset.getName());
    }

    @Test
    public void attack() {
        assertSame(123, playerPreset.getAttack());
    }
}
