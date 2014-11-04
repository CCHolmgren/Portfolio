using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

namespace BlackJack.controller
{
    class PlayGame
    {
        public bool Play(model.Game a_game, view.IView a_view)
        {
            a_view.SetGame(a_game);
            DisplayMessages(a_game, a_view);
            
            if (a_game.IsGameOver())
            {
                a_view.DisplayGameOver(a_game.IsDealerWinner());
            }

            int input = a_view.GetInput();

            if (input == a_view.WantToPlay())
            {
                a_game.NewGame();
            }
            else if (input == a_view.WantToHit())
            {
                a_game.Hit();
                //Escape early. If the player got over 21 then he lost, or atleast should initialize the gameover screen. Might want to work on this
                if (a_game.IsGameOver())
                {
                    a_view.DisplayGameOver(a_game.IsDealerWinner());
                    return input != a_view.WantToQuit();
                }
            }
            else if (input == a_view.WantToStand())
            {
                a_game.Stand();
            }

            return input != a_view.WantToQuit();
        }
        public void DisplayMessages(model.Game a_game, view.IView a_view)
        {
            a_view.DisplayWelcomeMessage();

            a_view.DisplayDealerHand(a_game.GetDealerHand(), a_game.GetDealerScore());
            a_view.DisplayPlayerHand(a_game.GetPlayerHand(), a_game.GetPlayerScore());
        }
    }
}
