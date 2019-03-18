package App;

import Boss.Boss;
import Boss.Raid;
import Overseer.Overseer;
import Player.*;
import Player.Exception.*;

public class App {
    private static int COMMAND_EXECUTION_FAILURE = 126;

    public static void main(String[] args) {
        // Create some player
        PlayerPreset preset = new PlayerPreset("Wolfgang", 100);
        Player somePlayer = new Player(preset);
        // Create another player
        PlayerPreset anotherPreset = new PlayerPreset("Gilbert", 90);
        Player anotherPlayer = new Player(anotherPreset);
        try {
            // Some player teams up with another player and create party
            Party braveParty = somePlayer.partyUp(anotherPlayer);
            // Find some boss
            Boss raidBoss = new Boss("Beorn");
            // Instantiate raid with found boss and created party
            Raid raid = new Raid(raidBoss, braveParty);
            // Pass raid to game observer and instantiate calculations with callbacks, timeouts and etc
            Overseer gameMaster = Overseer.getInstance();
            gameMaster.observe(raid);
            // Players takes some actions || Simultaneously boss takes some actions based on predefined primitive AI
        } catch (LogicException exception) {
            System.exit(COMMAND_EXECUTION_FAILURE);
        }
    }
}
