package TemirkhanN;

import Player.*;
import Player.Exception.*;

/**

interface Raid extends Subject {
    public Raid createRaid(Boss boss, Party party);

    public Boss getBoss();

    public Party getParty();
}

*/

public class Main {

    public static void main(String[] args) {

        // Create some player
        PlayerPreset preset = new PlayerPreset("Wolfgang", 100);
        Player somePlayer = new Player(preset);
        // Create another player
        PlayerPreset anotherPreset = new PlayerPreset("Gilbert", 90);
        Player anotherPlayer = new Player(anotherPreset);
        // Some player teams up with another player and create party
        try {
            somePlayer.partyUp(anotherPlayer);
        } catch (LogicException exception) {
            System.exit(126);
        }
        // Find some boss
        // Instantiate raid with found boss and created party
        // Pass raid to game observer and instantiate calculations with callbacks, timeouts and etc
        // Players takes some actions || Simultaneously boss takes some actions based on predefined primitive AI
    }
}
