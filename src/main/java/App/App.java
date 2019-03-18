package App;

import App.Event.Dispatcher;
import App.Event.EventDispatcher;
import App.Listener.SubjectLogListener;
import Boss.Boss;
import Boss.Raid;
import Overseer.Overseer;
import Player.*;
import Player.Exception.*;

public class App {
    private static int COMMAND_EXECUTION_FAILURE = 126;

    public static void main(String[] args) {
        //System initialization
        Dispatcher eventDispatcher = initializeEventDispatcher();
        Overseer gameMaster = new Overseer(eventDispatcher);

        // Create some player
        PlayerPreset preset = new PlayerPreset("Wolfgang", 100);
        Player somePlayer = new Player(preset);
        gameMaster.observe(somePlayer);
        // Create another player
        PlayerPreset anotherPreset = new PlayerPreset("Gilbert", 90);
        Player anotherPlayer = new Player(anotherPreset);
        gameMaster.observe(anotherPlayer);
        try {
            // Some player teams up with another player and create party
            Party braveParty = somePlayer.partyUp(anotherPlayer);
            gameMaster.observe(braveParty);
            // Find some boss
            Boss raidBoss = new Boss("Beorn");
            gameMaster.observe(raidBoss);
            // Instantiate raid with found boss and created party
            Raid raid = new Raid(raidBoss, braveParty);
            gameMaster.observe(raid);
            // Pass raid to game observer and instantiate calculations with callbacks, timeouts and etc
            gameMaster.observe(raid);
            // Players takes some actions || Simultaneously boss takes some actions based on predefined primitive AI
        } catch (LogicException exception) {
            System.exit(COMMAND_EXECUTION_FAILURE);
        }
    }

    private static Dispatcher initializeEventDispatcher() {
        EventDispatcher eventDispatcher = new EventDispatcher();
        eventDispatcher.registerListener("new_subject_in_game", new SubjectLogListener());

        return eventDispatcher;
    }
}
