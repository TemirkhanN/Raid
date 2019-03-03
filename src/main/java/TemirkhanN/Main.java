package TemirkhanN;

import java.util.List;

interface Subject {

}

interface Target {

}

interface Skill {

}

interface PlayerPreset {

}

interface Player extends Target, Subject {
    public Player createPlayer(PlayerPreset preset);

    public int attack(Target boss);

    public List<Skill> getSkills();

    public void useSkill(Skill skill, Target target);

    public Party partyUp(Player anotherPlayer);
}

interface Party extends Subject {
    public void joinRaid(Raid raid);
}

interface Boss extends Target, Subject {
    public void attack(Target target);
}

interface Raid extends Subject {
    public Raid createRaid(Boss boss, Party party);

    public Boss getBoss();

    public Party getParty();
}

interface Overseer {
    public void observe(Subject subject);
}


public class Main {

    public static void main(String[] args) {
        // Create some player
        // Create another player
        // Some player teams up with another player and create party
        // Find some boss
        // Instantiate raid with found boss and created party
        // Pass raid to game observer and instantiate calculations with callbacks, timeouts and etc
        // Players takes some actions || Simultaneously boss takes some actions based on predefined primitive AI
    }
}
